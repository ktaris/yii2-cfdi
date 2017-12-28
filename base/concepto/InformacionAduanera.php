<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base\concepto;

use ktaris\cfdi\components\BaseModel;

class InformacionAduanera extends BaseModel
{
    public $NumeroPedimento;

    public function rules()
    {
        return [
            [['NumeroPedimento'], 'safe'],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'NumeroPedimento',
        ];
    }
}
