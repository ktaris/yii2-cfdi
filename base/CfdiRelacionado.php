<?php

/**
 * @copyright Copyright (c) 2018 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base;

use ktaris\cfdi\components\BaseModel;

class CfdiRelacionado extends BaseModel
{
    public $UUID;

    public function rules()
    {
        return [
            [['UUID'], 'safe'],
        ];
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'UUID',
        ];
    }
}
