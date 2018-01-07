<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complemento;

use ktaris\cfdi\components\BaseModel;

class TimbreFiscalDigital extends BaseModel
{
    public $Version;
    public $UUID;
    public $FechaTimbrado;
    public $SelloCFD;
    public $NoCertificadoSAT;
    public $SelloSAT;

    public function rules()
    {
        return [
            [['Version', 'UUID', 'FechaTimbrado', 'SelloCFD', 'NoCertificadoSAT', 'SelloSAT'], 'safe'],
        ];
    }

    public function getCadenaOriginal()
    {
        $cadenaOriginal = '||';
        $cadenaOriginal .= $this->Version.'|';
        $cadenaOriginal .= $this->UUID.'|';
        $cadenaOriginal .= $this->FechaTimbrado.'|';
        $cadenaOriginal .= $this->SelloCFD.'|';
        $cadenaOriginal .= $this->NoCertificadoSAT.'|';
        $cadenaOriginal .= '|';

        return $cadenaOriginal;
    }
}
