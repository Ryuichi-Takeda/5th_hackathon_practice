<?php


namespace Utils;

class Utils{
    public static function header () {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header("Content-Type: application/json; charset=UTF-8");
    }
}
