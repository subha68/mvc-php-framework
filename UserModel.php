<?php

namespace app\core;

use \app\core\db\DBModel;

/**
* @autor AmaderEPathshala
* @package app\core
*/

abstract class UserModel extends DBModel {
    abstract public function getDisplayName() : string;
}