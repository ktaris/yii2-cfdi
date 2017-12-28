<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base\concepto;

use ktaris\cfdi\components\BaseModel;

class Parte extends BaseModel
{
    public $ClaveProdServ;
    public $NoIdentificacion;
    public $Cantidad;
    public $Unidad;
    public $Descripcion;
    public $ValorUnitario;
    public $Importe;

    public function rules()
    {
        return [
            [['ClaveProdServ', 'NoIdentificacion', 'Cantidad', 'Unidad', 'Descripcion', 'ValorUnitario' , 'Importe'], 'safe'],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'ClaveProdServ',
            'NoIdentificacion',
            'Cantidad',
            'Unidad',
            'Descripcion',
            'ValorUnitario',
            'Importe',
        ];
    }
}
