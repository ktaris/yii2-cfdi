<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complemento\cce11;

use ktaris\cfdi\components\BaseModel;

class Mercancia extends BaseModel
{
    public $NoIdentificacion;
    public $FraccionArancelaria;
    public $CantidadAduana;
    public $UnidadAduana;
    public $ValorUnitarioAduana;
    public $ValorDolares;

    public function rules()
    {
        return [
            [['NoIdentificacion', 'FraccionArancelaria', 'CantidadAduana', 'UnidadAduana', 'ValorUnitarioAduana', 'ValorDolares'], 'safe'],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'NoIdentificacion',
            'FraccionArancelaria',
            'CantidadAduana',
            'UnidadAduana',
            'ValorUnitarioAduana',
            'ValorDolares',
        ];
    }
}
