<?php

define("_ROOT", $_SERVER["DOCUMENT_ROOT"]);

// DB관련
define("_DB_HOST", "localhost");
define("_DB_USER", "root");
define("_DB_PASSWORD", "root506");
define("_DB_NAME", "minishop");
define("_DB_CHARSET", "utf8mb4");



// 기타
define("_EXTENSION_PHP", ".php"); // EXTENSION:확장자
define("_PATH_CONTROLLER", "application/controller/"); // 매직넘버를 상수로 처리. 컨트롤러 패스
define("_PATH_MODEL", "application/model/");
define("_PATH_VIEW", "application/view/");

define("_BASE_FILENAME_CONTROLLER", "Controller"); // 베이스 파일네임이 컨트롤러다.
define("_BASE_FILENAME_MODEL", "Model");


define("_BASE_REDIRECT", "Location: ");

define("_STR_LOGIN_ID", "u_id");
?>