<?php

namespace app\core\exceptions;

/**
* @autor AmaderEPathshala
* @package app\core\exceptions
*/

class ForbiddenException extends \Exception {
    protected $message = 'You don\'t have permission to access this page';
    protected $code = 403;
}

