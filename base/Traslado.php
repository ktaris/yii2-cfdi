<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base;

use ktaris\cfdi\components\BaseModel;

class Traslado extends BaseModel
{
    public $Impuesto;
    public $TipoFactor;
    public $TasaOCuota;
    public $Importe;

    public function rules()
    {
        return [
            [['Impuesto', 'TipoFactor', 'TasaOCuota', 'Importe'], 'safe'],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'Impuesto',
            'TipoFactor',
            'TasaOCuota',
            'Importe',
        ];
    }
}
