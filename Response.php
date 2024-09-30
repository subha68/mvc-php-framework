<?php

namespace app\core;

/**
* @autor AmaderEPathshala
* @package app\core
*/

class Response {
    public function setStatusCode($statusCode) {
        http_response_code($statusCode);
    }

    public function redirect($url) {
        header('Location: ' . $url);
    }
}
