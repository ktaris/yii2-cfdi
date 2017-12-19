<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base;

use ktaris\cfdi\components\BaseModel;

class Retencion extends BaseModel
{
    public $Impuesto;
    public $Importe;

    public function rules()
    {
        return [
            [['Impuesto', 'Importe'], 'safe'],
        ];
    }
}
