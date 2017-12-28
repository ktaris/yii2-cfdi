<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base\concepto;

use ktaris\cfdi\components\BaseModel;

class Impuestos extends BaseModel
{
    public $Traslados;
    public $Retenciones;

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
        if (empty($data) || empty($data['Impuestos'])) {
            return false;
        }

        // Lectura de Traslados.
        $this->Traslados = [];
        if (!empty($data['Impuestos']['Traslados'])) {
            foreach ($data['Impuestos']['Traslados'] as $i => $m) {
                $model = new Traslado;
                $model->load([$model->nombreDeClase => $m]);

                $this->Traslados[] = $model;
            }
        }
        // Lectura de Retenciones.
        $this->Retenciones = [];
        if (!empty($data['Impuestos']['Retenciones'])) {
            foreach ($data['Impuestos']['Retenciones'] as $i => $m) {
                $model = new Retencion;
                $model->load([$model->nombreDeClase => $m]);

                $this->Retenciones[] = $model;
            }
        }

        return true;
    }

    // ==================================================================
    //
    // Métodos para JSON para PreCFDI.
    //
    // ------------------------------------------------------------------

    protected function atributosPropiosParaJson()
    {
        return [];
    }

    public function toJson()
    {
        $arreglo = parent::toJson();

        if (!empty($this->Traslados)) {
            $arreglo['Traslados'] = [];
            foreach ($this->Traslados as $index => $model) {
                $arreglo['Traslados'][] = $model->toJson();
            }
        }

        if (!empty($this->Retenciones)) {
            $arreglo['Retenciones'] = [];
            foreach ($this->Retenciones as $index => $model) {
                $arreglo['Retenciones'][] = $model->toJson();
            }
        }

        return $arreglo;
    }
}
