<?php

namespace application\controller;

class Controller{
    protected $model;
    private static $modelList = [];

    // 생성자
    public function __construct($identityName, $action){
        // session start
        if(!isset($_SESSION)) {
            session_start();
        }

        // model 호출
        $this->model = $this->getModel($identityName);

        // controller의 메소드 호출
        $view = $this->$action();

        if(empty($view)) {
                echo "해당 컨트롤러 파일이 없습니다. : ".$controllerPath;
                exit();
        }

        // view 호출
        require_once $this->getView($view);
    }

    // model 호출하고 결과를 리턴
    protected function getModel($identityName) {
        // model 생성 체크
        if(!in_array($identityName, self::$modelList)) {
            $modelName = _PATH_MODEL.$identityName._BASE_FILENAME_MODEL;
            self::$modelList[$identityName] = new $modelName(); // model class 호출
        }
        return self::$modelList[$identityName];
    }

    // 파라미터를 확인해서 해당하는 view를 리턴하거나, redirect 
    public function getView($view) {
        
    }
}

