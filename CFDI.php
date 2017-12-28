<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi;

use ktaris\cfdi\base\Comprobante;
use ktaris\cfdi\base\Emisor;
use ktaris\cfdi\base\Receptor;
use ktaris\cfdi\base\Concepto;
use ktaris\cfdi\base\Impuestos;
use ktaris\cfdi\complemento\Complemento;
use ktaris\cfdi\components\ImpuestosTrait;

class CFDI extends Comprobante
{
    use ImpuestosTrait;

    // ==================================================================
    //
    // Modelos asociados.
    //
    // ------------------------------------------------------------------

    public $Emisor;
    public $Receptor;
    public $Conceptos;
    public $Impuestos;

    // ==================================================================
    //
    // Complementos
    //
    // ------------------------------------------------------------------

    public $Complemento;

    // ==================================================================
    //
    // Métodos de Yii2.
    //
    // ------------------------------------------------------------------

    public function init()
    {
        $this->Emisor = new Emisor;
        $this->Receptor = new Receptor;
        $this->Conceptos = [];
        // Impuestos no es requerido.

        $this->Complemento = new Complemento;
    }

    public function load($data, $formName = null)
    {
        $loaded = parent::load([$this->nombreDeClase => $data], $formName);


        $loaded &= $this->Emisor->load($data);
        $loaded &= $this->Receptor->load($data);
        $loaded &= $this->loadConceptos($data);
        $this->loadImpuestos($data);
        $loaded &= $this->Complemento->load($data);

        return $loaded;
    }

    // ==================================================================
    //
    // Métodos auxiliares protegidos.
    //
    // ------------------------------------------------------------------

    protected function loadConceptos($data)
    {
        $loaded = false;

        if (empty($this->Conceptos)) {
            if (!empty($data['Conceptos'])) {
                foreach ($data['Conceptos'] as $i => $modelData) {
                    $model = new Concepto;
                    $model->load([$model->nombreDeClase => $modelData]);
                    $this->Conceptos[$i] = $model;
                }

                $loaded = true;
            }
        }

        return $loaded;
    }

    protected function loadImpuestos($data)
    {
        $loaded = false;

        if (empty($this->Impuestos)) {
            if (!empty($data['Impuestos'])) {
                $this->Impuestos = new Impuestos;
                $this->Impuestos->load($data);

                $loaded = true;
            }
        }

        return $loaded;
    }

    // ==================================================================
    //
    // Métodos para JSON para PreCFDI.
    //
    // ------------------------------------------------------------------

    public function toJson()
    {
        $arreglo = parent::toJson();

        $arreglo['Emisor'] = $this->Emisor->toJson();
        $arreglo['Receptor'] = $this->Receptor->toJson();
        $arreglo['Conceptos'] = [];
        foreach ($this->Conceptos as $index => $model) {
            $arreglo['Conceptos'][] = $model->toJson();
        }
        if (!empty($this->Impuestos)) {
            $arreglo['Impuestos'] = $this->Impuestos->toJson();
        }

        if ($this->Complemento->tieneComplemento) {
            $arreglo['Complemento'] = $this->Complemento->toJson();
        }

        return $arreglo;
    }
}
