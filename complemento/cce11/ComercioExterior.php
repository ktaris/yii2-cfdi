<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complemento\cce11;

use ktaris\cfdi\components\BaseModel;

class ComercioExterior extends BaseModel
{
    public $Version;
    public $MotivoTraslado;
    public $TipoOperacion;
    public $ClaveDePedimento;
    public $CertificadoOrigen;
    public $NumCertificadoOrigen;
    public $NumeroExportadorConfiable;
    public $Incoterm;
    public $Subdivision;
    public $Observaciones;
    public $TipoCambioUSD;
    public $TotalUSD;

    public function rules()
    {
        return [
            [['Version', 'MotivoTraslado', 'TipoOperacion', 'ClaveDePedimento', 'CertificadoOrigen', 'NumCertificadoOrigen', 'NumeroExportadorConfiable', 'Incoterm', 'Subdivision', 'Observaciones', 'TipoCambioUSD', 'TotalUSD'], 'safe'],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'Version',
            'MotivoTraslado',
            'TipoOperacion',
            'ClaveDePedimento',
            'CertificadoOrigen',
            'NumCertificadoOrigen',
            'NumeroExportadorConfiable',
            'Incoterm',
            'Subdivision',
            'Observaciones',
            'TipoCambioUSD',
            'TotalUSD',
        ];
    }
}
