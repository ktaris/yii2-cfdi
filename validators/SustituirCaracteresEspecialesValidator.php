<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\validators;

use yii\validators\Validator;

class SustituirCaracteresEspecialesValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $caracteresEspeciales  = array('|',);
        $caracteresEspecialesCodigo = array('&#x007c;');
        $$model->$attribute = str_replace($caracteresEspeciales, $caracteresEspecialesCodigo, $model->$attribute);
    }
}
