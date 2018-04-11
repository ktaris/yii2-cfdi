<?php

/**
 * @copyright Copyright (c) 2018 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\validators;

use yii\validators\Validator;

class VacioValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $message = $this->message;
        if (empty($message)) {
            $message = 'El atributo {attribute} debe estar vacío.';
        }

        if (!empty($model->{$attribute})) {
            $this->addError($model, $attribute, $message);
        }
    }
}
