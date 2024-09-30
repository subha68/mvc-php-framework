<?php

namespace app\core\form;

use app\core\Model;

/**
* @autor AmaderEPathshala
* @package app\core
*/

class TextareaField extends Field {
    public function renderInput() : string {
        return sprintf(
                '<textarea name="%s" class="form-control%s">%s</textarea>',
            $this->attribute,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->{$this->attribute},
        );
    }
}