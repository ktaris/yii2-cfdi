<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complemento\cce11;

use ktaris\cfdi\components\BaseModel;

class Domicilio extends BaseModel
{
    public $Calle;
    public $NumeroExterior;
    public $NumeroInterior;
    public $Colonia;
    public $Localidad;
    public $Referencia;
    public $Municipio;
    public $Estado;
    public $Pais;
    public $CodigoPostal;

    public function rules()
    {
        return [
            [['Calle', 'NumeroExterior', 'NumeroInterior', 'Colonia', 'Localidad', 'Referencia', 'Municipio', 'Estado', 'Pais', 'CodigoPostal'], 'safe'],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'Calle',
            'NumeroExterior',
            'NumeroInterior',
            'Colonia',
            'Localidad',
            'Referencia',
            'Municipio',
            'Estado',
            'Pais',
            'CodigoPostal',
        ];
    }
}
