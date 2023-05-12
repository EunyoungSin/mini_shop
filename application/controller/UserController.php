<?php
namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function loginPost() {
        $result = $this->model->getUser($_POST); // model은 Controller.php에 protected로 정의되어있음.
        // 유저 유무 체크
        if(count($result) === 0) {
            $errMsg = "입력하신 회원 정보가 없습니다.";
            $this->addDynamicProperty("errMsg", $errMsg);
            // 로그인 페이지 리턴
            return "login"._EXTENSION_PHP;
        }
        // session에 User ID 저장
        $_SESSION[_STR_LOGIN_ID] = $_POST["id"];


        // 리스트 페이지 리턴
        return _BASE_REDIRECT."/product/list";
    }

    //로그아웃 메소드
    public function logoutGet() {
        session_unset();
        session_destroy(); // 유저와 우리의 연결고리 끊기
        //로그인 페이지 리턴
        return "login"._EXTENSION_PHP;
    }
}

// 이미 GET 방식으로 로그인해서 들어왔는데 다른 페이지로 값을 전송해야할 때 같은 GET 방식으로 들어가면 복잡하고, POST 방식으로 추가적인 처리를 하면 좋음.
// url에서 GET 방식으로 사용하지 않음. 내부정보가 유출되기 때문.