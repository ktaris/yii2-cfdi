<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complementoconcepto;

use ktaris\cfdi\components\BaseModel;

class InstitucionesEducativas extends BaseModel
{
    public $version;
    public $nombreAlumno;
    public $CURP;
    public $nivelEducativo;
    public $autRVOE;
    public $rfcPago;

    public function rules()
    {
        return [
            [['version', 'nombreAlumno', 'CURP', 'nivelEducativo', 'autRVOE', 'rfcPago'], 'safe'],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'version',
            'nombreAlumno',
            'CURP',
            'nivelEducativo',
            'autRVOE',
            'rfcPago',
        ];
    }
}
