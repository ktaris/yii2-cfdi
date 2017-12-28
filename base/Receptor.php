<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base;

use ktaris\cfdi\components\BaseModel;
use ktaris\cfdi\validators\EliminarEspacioValidator;

class Receptor extends BaseModel
{
    public $Rfc;
    public $Nombre;
    public $ResidenciaFiscal;
    public $NumRegIdTrib;
    public $UsoCFDI;

    public function rules()
    {
        return [
            [['Rfc', 'Nombre', 'ResidenciaFiscal', 'NumRegIdTrib', 'UsoCFDI'], EliminarEspacioValidator::className()],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'Rfc',
            'Nombre',
            'ResidenciaFiscal',
            'NumRegIdTrib',
            'UsoCFDI',
        ];
    }
}
