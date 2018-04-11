<?php

/**
 * @copyright Copyright (c) 2018 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\validators\pagos;

use Yii;
use yii\validators\NumberValidator;

class CeroValidator extends NumberValidator
{
    public function init()
    {
        parent::init();

        $this->min = 0;
        $this->max = 0;

        if (strcmp(Yii::t('yii', '{attribute} must be a number.'), $this->message) === 0) {
            $this->message = 'El {attribute} debe ser igual a cero para recepción de pagos.';
        }

        $this->tooBig = $this->message;
        $this->tooSmall = $this->message;
    }
}
