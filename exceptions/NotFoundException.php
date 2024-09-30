<?php

namespace app\core\exceptions;

/**
* @autor AmaderEPathshala
* @package app\core\exceptions
*/

class NotFoundException extends \Exception {
    protected $message = 'Page not found';
    protected $code = 404;
}

