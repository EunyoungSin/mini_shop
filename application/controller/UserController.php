<?php
namespace application\controller;

// Controller를 상속 받아 __construct가 실행됨.
class UserController extends Controller {
    // 로그인 페이지 이동(get 방식)
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    // 로그인 메소드(post 방식)
    public function loginPost() {
        $result = $this->model->getUser($_POST); // model은 Controller.php에 protected로 정의되어있음.
        $this->model->close(); // DB 파기

        // 유저 유무 체크
        if(count($result) === 0) {
            $errMsg = "We were unable to verify<br>your id or password.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 로그인 페이지 리턴
            return "login"._EXTENSION_PHP;
        }
        // session에 User ID 저장
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];

        // 메인 페이지 리턴
        return _BASE_REDIRECT."/shop/main";
    }

    // 로그아웃 메소드(get 방식)
    public function logoutGet() {
        session_unset();
        session_destroy(); // 유저와 우리의 연결고리 끊기
        //로그인 페이지 리턴
        return "login"._EXTENSION_PHP;
    }

    // 회원가입 페이지 이동(get 방식)
    public function signupGet() {
        return "signup"._EXTENSION_PHP;
    }

    //회원가입 메소드(post 방식)
    public function signupPost() {
        $arrPost = $_POST;
        $arrChkErr = [];
        // 유효성체크 (글자 수 체크. mb:multibyte)
        // ID 글자 수 체크
        if(mb_strlen($arrPost["id"]) === 0 || mb_strlen($arrPost["id"]) > 12) {
            $arrChkErr["id"] = "ID는 12글자 이하로 입력해주세요.";
        }
        // ID 영문숫자 체크 (해보기)

        // PW 글자수 체크
        if(mb_strlen($arrPost["pw"]) < 8 || mb_strlen($arrPost["pw"]) > 20) {
            $arrChkErr["pw"] = "PW는 8~20글자 이하로 입력해주세요.";
        }
        // PW 영문숫자 특수문자 체크 (해보기)

        // 비밀번호와 비밀번호 체크 확인
        if($arrPost["pw"] !== $arrPost["pwChk"]) {
            $arrChkErr["pwChk"] = "비밀번호와 비밀번호 확인이 일치하지 않습니다.";
        }

        // NAME 글자수 체크
        if(mb_strlen($arrPost["name"]) === 0 || mb_strlen($arrPost["name"]) > 30) {
            $arrChkErr["name"] = "이름은 30글자 이하로 입력해주세요.";
        }

        // 유효성체크 에러일 경우
        if(!empty($arrChkErr)) {
            // 에러메세지 셋팅
            $this->addDynamicProperty('arrError', $arrChkErr);
            return "signup"._EXTENSION_PHP;
        }

        $result = $this->model->getUser($arrPost, false);

        // 유저 유무 체크
        if(count($result) !== 0) {
            $errMsg = "ID already in use.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 회원가입 페이지 리턴
            return "signup"._EXTENSION_PHP;
        }

        // Transaction start
        $this->model->beginTran();

        // user insert
        if(!$this->model->insertUser($arrPost)) {
            // 예외처리 롤백
            $this->model->rollback();
            echo "User Regist ERROR";
            exit();
        }
        $this->model->commit(); // 정상처리 커밋
        // **** Transaction End

        // 로그인페이지로 이동
        return _BASE_REDIRECT."/user/login";
    }
}

// 이미 GET 방식으로 로그인해서 들어왔는데 다른 페이지로 값을 전송해야할 때 같은 GET 방식으로 들어가면 복잡하고, POST 방식으로 추가적인 처리를 하면 좋음.
// url에서 GET 방식으로 사용하지 않음. 내부정보가 유출되기 때문.
// $액션 대신 $레지스트레이션 겟, $레지스트레이션 포스트. 페이지 이동은 get, 입력한 값 버튼 눌렀을 때 전송하는 post
// usercontroller에 먼저 함수를 만든 후 html 작성
// 백엔드에서 유효성 체크
// mariaDB\data\my.ini 파일 실행 후 autocommit=0 삭제 후 서비스에서 서버 재시작

// public function signupPost() {
//     $result = $this->model->signupUser($_POST); // model은 Controller.php에 protected로 정의되어있음.
//     // 유저 유무 체크
//     if(!empty($result)) {
//         $errMsg = "You are already registered.";
//         $this->addDynamicProperty("errMsg", $errMsg);
//         // 로그인 페이지 리턴
//         return "login"._EXTENSION_PHP;
//     }
//     // session에 User ID 저장
//     $_SESSION[_STR_LOGIN_ID] 
//     = $_POST["id"];

//     // 메인 페이지 리턴
//     return _BASE_REDIRECT."/shop/main";
// }