<?php

namespace aep\phpmvc\form;

/**
* @autor AmaderEPathshala
* @package aep\phpmvc
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