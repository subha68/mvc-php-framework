<?php

namespace app\core\form;

/**
* @autor AmaderEPathshala
* @package app\core
*/

class Form {
    public static function begin($action, $method) {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end() {
        echo '</form>';
    }

    public function field($model, $attribute) {
        return new InputField($model, $attribute);
    }
}