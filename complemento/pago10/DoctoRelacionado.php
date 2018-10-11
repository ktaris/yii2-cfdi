<?php

/**
 * @copyright Copyright (c) 2018 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.1
 */

namespace ktaris\cfdi\complemento\pago10;

use ktaris\cfdi\components\BaseModel;

class DoctoRelacionado extends BaseModel
{
    public $IdDocumento;
    public $Serie;
    public $Folio;
    public $MonedaDR;
    public $TipoCambioDR;
    public $MetodoDePagoDR;
    public $NumParcialidad;
    public $ImpSaldoAnt;
    public $ImpPagado;
    public $ImpSaldoInsoluto;

    public function rules()
    {
        return [
            [['IdDocumento', 'Serie', 'Folio', 'MonedaDR', 'TipoCambioDR', 'MetodoDePagoDR', 'NumParcialidad', 'ImpSaldoAnt', 'ImpPagado', 'ImpSaldoInsoluto'], 'safe'],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'IdDocumento',
            'Serie',
            'Folio',
            'MonedaDR',
            'TipoCambioDR',
            'MetodoDePagoDR',
            'NumParcialidad',
            'ImpSaldoAnt',
            'ImpPagado',
            'ImpSaldoInsoluto',
        ];
    }
}
