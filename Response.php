<?php

namespace aep\phpmvc;

/**
* @autor AmaderEPathshala
* @package aep\phpmvc
*/

class Response {
    public function setStatusCode($statusCode) {
        http_response_code($statusCode);
    }

    public function redirect($url) {
        header('Location: ' . $url);
    }
}
