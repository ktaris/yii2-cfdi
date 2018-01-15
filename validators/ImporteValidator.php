<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\validators;

use yii\validators\Validator;

class ImporteValidator extends Validator
{
    public $decimales;

    /**
     * Da formato a un importe para ajustarlo a los decimales necesarios.
     * @param  mixed $model      modelo de CFDI con algún importe.
     * @param  string $attribute modelo a ser validado
     *
     * @return float             número con el máximo de decimales especificado.
     */
    public function validateAttribute($model, $attribute)
    {
        $model->$attribute = round($model->$attribute, $decimales);
    }

    public function init()
    {
        parent::init();

        if ($this->decimales === null) {
            $this->decimales = 2;
        }
    }
}
