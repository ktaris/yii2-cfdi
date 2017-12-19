<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base;

use ktaris\cfdi\components\BaseModel;
use ktaris\cfdi\base\ConceptoImpuestos as Impuestos;
use ktaris\cfdi\components\ImpuestosTrait;

class Concepto extends BaseModel
{
    use ImpuestosTrait;

    // ==================================================================
    //
    // Atributos del nodo.
    //
    // ------------------------------------------------------------------
    public $ClaveProdServ;
    public $NoIdentificacion;
    public $Cantidad;
    public $ClaveUnidad;
    public $Unidad;
    public $Descripcion;
    public $ValorUnitario;
    public $Importe;
    public $Descuento;
    // ==================================================================
    //
    // Información en nodos hijo.
    //
    // ------------------------------------------------------------------
    public $Impuestos;

    public function rules()
    {
        return [
            [['ClaveProdServ', 'NoIdentificacion', 'Cantidad', 'ClaveUnidad', 'Unidad', 'Descripcion', 'ValorUnitario', 'Importe', 'Descuento'], 'safe'],
        ];
    }

    public function load($data, $formName = null)
    {
        $loaded = parent::load($data, $formName);
        $this->loadImpuestos(current($data));

        return $loaded;
    }

    protected function loadImpuestos($data)
    {
        if (empty($data) || empty($data['Impuestos'])) {
            return false;
        }

        $this->Impuestos = new Impuestos;
        return $this->Impuestos->load($data);
    }
}
