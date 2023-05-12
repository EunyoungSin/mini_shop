<?php
namespace application\controller;

class UserController extends Controller {
    public function loginGet() {
        return "login"._EXTENSION_PHP;
    }

    public function loginPost() {
        return _BASE_REDIRECT."/product/list";
    }
    
}

// 이미 GET 방식으로 로그인해서 들어왔는데 다른 페이지로 값을 전송해야할 때 같은 GET 방식으로 들어가면 복잡하고, POST 방식으로 추가적인 처리를 하면 좋음.
// url에서 GET 방식으로 사용하지 않음. 내부정보가 유출되기 때문.