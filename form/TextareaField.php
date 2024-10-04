<?php

namespace aep\phpmvc\form;

use aep\phpmvc\Model;

/**
* @autor AmaderEPathshala
* @package aep\phpmvc
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