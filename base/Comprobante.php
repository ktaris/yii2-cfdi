<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base;

use ktaris\cfdi\components\BaseModel;

class Comprobante extends BaseModel
{
    public $Version;
    public $Serie;
    public $Folio;
    public $Fecha;
    public $Sello;
    public $FormaPago;
    public $NoCertificado;
    public $Certificado;
    public $CondicionesDePago;
    public $SubTotal;
    public $Descuento;
    public $Moneda;
    public $TipoCambio;
    public $Total;
    public $TipoDeComprobante;
    public $MetodoPago;
    public $LugarExpedicion;
    public $Confirmacion;

    public function rules()
    {
        return [
            [['Version', 'Serie', 'Folio', 'Fecha', 'Sello','FormaPago', 'NoCertificado', 'Certificado', 'CondicionesDePago', 'SubTotal', 'Descuento', 'Moneda', 'TipoCambio', 'Total', 'TipoDeComprobante', 'MetodoPago', 'LugarExpedicion', 'Confirmacion'], 'safe'],
        ];
    }
}
