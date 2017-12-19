<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complementos;

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

    /**
     * Este objeto se encarga de cargar los {@link ktaris\cfdi\base\Traslado}
     * y los {@link ktaris\cfdi\base\Retencion}, para entregar acceso
     * a los modelos a través de él.
     * @param  array  $data     datos del concepto, para revisar si contiene
     * impuestos.
     * @param  string $formName nombre del formulario o modelo leído.
     * @return boolean          determina si se cargaron datos.
     */
    public function load($data, $formName = null)
    {
        if (empty($data['Complemento']['TimbreFiscalDigital'])) {
            return false;
        }

        return parent::load([$this->nombreDeClase => $data['Complemento']['TimbreFiscalDigital']]);
    }
}
