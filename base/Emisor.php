<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base;

use ktaris\cfdi\components\BaseModel;

class Emisor extends BaseModel
{
    public $Rfc;
    public $Nombre;
    public $RegimenFiscal;

    public function rules()
    {
        return [
            [['Rfc', 'Nombre', 'RegimenFiscal'], 'safe'],
        ];
    }
}
