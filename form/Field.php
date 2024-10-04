<?php

namespace aep\phpmvc\form;

use aep\phpmvc\Model;

/**
* @autor AmaderEPathshala
* @package aep\phpmvc
*/

abstract class Field {
    public Model $model;
    public string $attribute;

    public function __construct(Model $model, string $attribute) {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString() {
        return sprintf(
            '<div class="mb-3">
                <label>%s</label>
                %s
                <div class="invalid-feedback">
                    %s
                </div>
            </div>',
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }

    public abstract function renderInput() : string;
}
