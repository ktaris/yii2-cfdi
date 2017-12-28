<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\validators;

use yii\validators\Validator;

class EliminarEspacioValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        // Eliminamos los datos del inicio y del final.
        $model->$attribute = trim($model->$attribute);
        // Compactamos los espacios dobles dentro de la cadena, si existen.
        $model->$attribute = preg_replace('/\s+/', ' ', $model->$attribute);
    }
}
