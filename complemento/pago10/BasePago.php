<?php

/**
 * @copyright Copyright (c) 2018 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.1
 */

namespace ktaris\cfdi\complemento\pago10;

use ktaris\cfdi\components\BaseModel;

class BasePago extends BaseModel
{
    public $FechaPago;
    public $FormaDePagoP;
    public $MonedaP;
    public $TipoCambioP;
    public $Monto;
    public $NumOperacion;
    public $RfcEmisorCtaOrd;
    public $NomBancoOrdExt;
    public $CtaOrdenante;
    public $RfcEmisorCtaBen;
    public $CtaBeneficiario;
    public $TipoCadPago;
    public $CertPago;
    public $CadPago;
    public $SelloPago;

    public function rules()
    {
        return [
            [['FechaPago', 'FormaDePagoP', 'MonedaP', 'TipoCambioP', 'Monto', 'NumOperacion', 'RfcEmisorCtaOrd', 'NomBancoOrdExt', 'CtaOrdenante', 'RfcEmisorCtaBen', 'CtaBeneficiario', 'TipoCadPago', 'CertPago', 'CadPago', 'SelloPago'], 'safe'],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'FechaPago',
            'FormaDePagoP',
            'MonedaP',
            'TipoCambioP',
            'Monto',
            'NumOperacion',
            'RfcEmisorCtaOrd',
            'NomBancoOrdExt',
            'CtaOrdenante',
            'RfcEmisorCtaBen',
            'CtaBeneficiario',
            'TipoCadPago',
            'CertPago',
            'CadPago',
            'SelloPago',
        ];
    }
}
