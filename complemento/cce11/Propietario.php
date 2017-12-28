<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complemento\cce11;

use ktaris\cfdi\components\BaseModel;

class Propietario extends BaseModel
{
    public $NumRegIdTrib;
    public $ResidenciaFiscal;

    public function rules()
    {
        return [
            [['NumRegIdTrib', 'ResidenciaFiscal'], 'safe'],
        ];
    }
}
