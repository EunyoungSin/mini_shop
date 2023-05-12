<?php

spl_autoload_register( function($path) {
    $path = str_replace("\\", "/", $path); // "\\"를 "/"로 변환
    // $arr_path = explode("/", $path); // "/"를 기준으로 배열로 변환

    // 해당 파일 require
    require_once($path._EXTENSION_PHP);
});


?>