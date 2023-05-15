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
            $result = $this->model->signupUser($_POST); // model은 Controller.php에 protected로 정의되어있음.
            // 유저 유무 체크
            if(count($result) !== 0) {
                $errMsg = "You are already registered.";
                $this->addDynamicProperty("errMsg", $errMsg);
                // 로그인 페이지 리턴
                return "login"._EXTENSION_PHP;
            }
            // session에 User ID 저장
            $_SESSION[_STR_LOGIN_ID] = $_POST["id"];
    
            // 메인 페이지 리턴
            return _BASE_REDIRECT."/shop/main";
        }
    }

// 이미 GET 방식으로 로그인해서 들어왔는데 다른 페이지로 값을 전송해야할 때 같은 GET 방식으로 들어가면 복잡하고, POST 방식으로 추가적인 처리를 하면 좋음.
// url에서 GET 방식으로 사용하지 않음. 내부정보가 유출되기 때문.
// $액션 대신 $레지스트레이션 겟, $레지스트레이션 포스트. 페이지 이동은 get, 입력한 값 버튼 눌렀을 때 전송하는 post