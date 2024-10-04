<?php

namespace aep\phpmvc\exceptions;

/**
* @autor AmaderEPathshala
* @package aep\phpmvc\exceptions
*/

class NotFoundException extends \Exception {
    protected $message = 'Page not found';
    protected $code = 404;
}

