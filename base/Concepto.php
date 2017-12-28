<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base;

use ktaris\cfdi\base\concepto\Concepto as BaseConcepto;
use ktaris\cfdi\base\concepto\Impuestos;
use ktaris\cfdi\base\concepto\InformacionAduanera;
use ktaris\cfdi\complementoconcepto\ComplementoConcepto;
use ktaris\cfdi\components\ImpuestosTrait;

class Concepto extends BaseConcepto
{
    use ImpuestosTrait;

    // ==================================================================
    //
    // Información en nodos hijo.
    //
    // ------------------------------------------------------------------
    public $Impuestos;
    public $InformacionAduanera;
    public $ComplementoConcepto;

    // ==================================================================
    //
    // Lectura de datos.
    //
    // ------------------------------------------------------------------

    public function load($data, $formName = null)
    {
        $loaded = parent::load($data, $formName);

        $data = current($data); // Elimina el nombre del modelo superior.

        $this->loadImpuestos($data);
        $this->loadInformacionAduanera($data);
        $this->loadComplementoConcepto($data);

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

    protected function loadInformacionAduanera($data)
    {
        $loaded = false;

        if (empty($this->InformacionAduanera)) {
            if (!empty($data['InformacionAduanera'])) {
                $this->InformacionAduanera = [];

                foreach ($data['InformacionAduanera'] as $i => $modelData) {
                    $model = new InformacionAduanera;
                    $model->load([$model->nombreDeClase => $modelData]);
                    $this->InformacionAduanera[$i] = $model;
                }

                $loaded = true;
            }
        }

        return $loaded;
    }

    protected function loadComplementoConcepto($data)
    {
        if (empty($data['ComplementoConcepto'])) {
            return false;
        }

        $this->ComplementoConcepto = new ComplementoConcepto;
        return $this->ComplementoConcepto->load($data);
    }

    // ==================================================================
    //
    // Métodos para JSON para PreCFDI.
    //
    // ------------------------------------------------------------------

    public function toJson()
    {
        $arreglo = parent::toJson();

        if (!empty($this->Impuestos)) {
            $arreglo['Impuestos'] = $this->Impuestos->toJson();
        }

        if (!empty($this->InformacionAduanera)) {
            foreach ($this->InformacionAduanera as $index => $model) {
                $arreglo['InformacionAduanera'][] = $model->toJson();
            }
        }

        if (!empty($this->ComplementoConcepto) && $this->ComplementoConcepto->tieneComplemento) {
            $arreglo['ComplementoConcepto'] = $this->ComplementoConcepto->toJson();
        }

        return $arreglo;
    }
}
