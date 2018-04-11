<?php

/**
 * @copyright Copyright (c) 2018 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\validators;

use yii\validators\Validator;

class UuidValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $message = null;

        if (strlen($model->{$attribute}) != 40) {
            $message = 'El {attribute} debe tener una longitud de 40 caracteres.';
        }
        // Se deja abierto para una posible validación más extensa posteriormente.

        $this->agregarError($model, $attribute, $message);
    }

    protected function agregarError($model, $attribute, $message = null)
    {
        // Si no hay nada, regresamos.
        if ($this->message === null && $message === null) {
            return;
        } elseif ($this->message === null && $message !== null) {
            $this->addError($model, $attribute, $message);
        } else {
            $this->addError($model, $attribute, $this->message);
        }
    }
}
