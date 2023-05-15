<?php
namespace application\util; // php 파일이 있는 위치

class UrlUtil {

    // $_GET["url"]을 분석해서 리턴
    public static function getUrl() {
        return $path = isset($_GET["url"]) ? $_GET["url"] : "";
    }

    // URL을 "/"로 구분해서 배열을 만들고 리턴
    public static function getUrlArrPath() {
        // static이 아닌 프로퍼티 사용시 사용방법
        // $obj = new UrlUtil();
        // $obj = getUrl();

        //$url = getUrl();
        $url = UrlUtil::getUrl();
        return $url !== "" ? explode("/", $url) : ""; // "/" 단위로 쪼개서 배열로 만들어줘
    }

    // "/"를 "\"로 치환해주는 메소드
    public static function replaceSlashToBackslash($str) {
        return str_replace("/", "\\", $str);
    }
}

// 객체지향 프로그래밍시 최대한 기능을 쪼개야 단위테스트시 편함