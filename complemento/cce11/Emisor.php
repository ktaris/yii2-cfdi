<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complemento\cce11;

use ktaris\cfdi\components\BaseModel;

class Emisor extends BaseModel
{
    // ==================================================================
    //
    // Atributos del nodo.
    //
    // ------------------------------------------------------------------
    public $Curp;
    // ==================================================================
    //
    // Información en nodos hijo.
    //
    // ------------------------------------------------------------------
    public $Domicilio;

    public function rules()
    {
        return [
            [['Curp'], 'safe'],
        ];
    }

    // ==================================================================
    //
    // Lectura de datos.
    //
    // ------------------------------------------------------------------

    public function load($data, $formName = null)
    {
        $loaded = parent::load([$this->nombreDeClase => $data], $formName);

        $loaded &= $this->loadDomicilio($data);

        return $loaded;
    }

    protected function loadDomicilio($data)
    {
        if (!empty($data['Domicilio'])) {
            $this->Domicilio = new Domicilio;
            return $this->Domicilio->load($data);
        }

        return false;
    }

    // ==================================================================
    //
    // Métodos para JSON para PreCFDI.
    //
    // ------------------------------------------------------------------

    protected function atributosPropiosParaJson()
    {
        return [
            'Curp',
        ];
    }

    public function toJson()
    {
        $arreglo = parent::toJson();

        if (!empty($this->Domicilio)) {
            $arreglo['Domicilio'] = $this->Domicilio->toJson();
        }

        return $arreglo;
    }
}
