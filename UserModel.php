<?php

namespace aep\phpmvc;

use \aep\phpmvc\db\DBModel;

/**
* @autor AmaderEPathshala
* @package aep\phpmvc
*/

abstract class UserModel extends DBModel {
    abstract public function getDisplayName() : string;
}