<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base;

use ktaris\cfdi\components\BaseModel;

class Concepto extends BaseModel
{
    public $ClaveProdServ;
    public $NoIdentificacion;
    public $Cantidad;
    public $ClaveUnidad;
    public $Unidad;
    public $Descripcion;
    public $ValorUnitario;
    public $Importe;
    public $Descuento;

    public function rules()
    {
        return [
            [['ClaveProdServ', 'NoIdentificacion', 'Cantidad', 'ClaveUnidad', 'Unidad', 'Descripcion', 'ValorUnitario', 'Importe', 'Descuento'], 'safe'],
        ];
    }
}
