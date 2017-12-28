<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base\concepto;

use ktaris\cfdi\components\BaseModel;

class CuentaPredial extends BaseModel
{
    public $Numero;

    public function rules()
    {
        return [
            [['Numero'], 'safe'],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'Numero',
        ];
    }
}
