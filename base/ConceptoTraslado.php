<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base;

use ktaris\cfdi\components\BaseModel;

class ConceptoTraslado extends BaseModel
{
    public $Base;
    public $Impuesto;
    public $TipoFactor;
    public $TasaOCuota;
    public $Importe;

    public function rules()
    {
        return [
            [['Base', 'Impuesto', 'TipoFactor', 'TasaOCuota', 'Importe'], 'safe'],
        ];
    }
}
