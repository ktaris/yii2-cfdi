<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complemento\cce11;

use ktaris\cfdi\components\BaseModel;

class DescripcionesEspecificas extends BaseModel
{
    public $Marca;
    public $Modelo;
    public $SubModelo;
    public $NumeroSerie;

    public function rules()
    {
        return [
            [['Marca', 'Modelo', 'SubModelo', 'NumeroSerie'], 'safe'],
        ];
    }
}
