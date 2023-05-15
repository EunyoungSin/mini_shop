<?php

namespace application\lib;

// 어떤 유틸리티를 사용할지 선언
use application\util\UrlUtil;
// 파일명과 클래스명이 동일하게 감
class Application {

    //생성자
    public function __construct() {
        $arrPath = UrlUtil::getUrlArrPath(); // 접속 URL을 배열로 획득
        $identityName = empty($arrPath[0]) ? "Shop" : ucfirst($arrPath[0]); //ucfirst 첫번째만 대문자로, ucworld는 전부 다 앞글자 대문자로
        // 수정 전 Shop -> Product
        $action = (empty($arrPath[1]) ? "main" : $arrPath[1]).ucfirst(strtolower($_SERVER["REQUEST_METHOD"]));
        // 수정 전 list -> main
        // request method : GET, POST. $_SERVER["REQUEST_METHOD"]는 대문자로 값을 받아와서 strtolower로 소문자로 바꾼 후, ucfirst로 맨 앞글자만 대문자로 바꿔줌.

        // controller명 작성
        $controllerPath = _PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER._EXTENSION_PHP;
        

        // 해당 controller 파일 존재 여부 체크. 에러 처리를 보통 이렇게 함.
        if(!file_exists($controllerPath)){
            echo "해당 컨트롤러 파일이 없습니다. : ".$controllerPath;
            exit();
        }

        // var_dump($arrPath);
        // var_dump($identityName, $action);
        // exit;

        // 해당 컨트롤러 호출
        $controllerName = UrlUtil::replaceSlashToBackslash(_PATH_CONTROLLER.$identityName._BASE_FILENAME_CONTROLLER);
        new $controllerName($identityName, $action); // 특정 값을 변수에 담고 클래스를 만들어주는 경우도 있음.
    }
}

// Application에서 UserController 호출