<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complemento;

use ktaris\cfdi\complemento\pago10\Pagos as BasePagos;
use ktaris\cfdi\complemento\pago10\Pago;

class Pagos extends BasePagos
{
    // ==================================================================
    //
    // Modelos asociados.
    //
    // ------------------------------------------------------------------
    public $Pagos;

    // ==================================================================
    //
    // Lectura de datos.
    //
    // ------------------------------------------------------------------

    public function load($data, $formName = null)
    {
        $loaded = parent::load([$this->nombreDeClase => $data], $formName);

        $loaded &= $this->loadPagos($data);

        return $loaded;
    }

    protected function loadPagos($data)
    {
        $loaded = false;

        if (empty($this->Pagos)) {
            if (!empty($data['Pagos'])) {
                foreach ($data['Pagos'] as $i => $modelData) {
                    $model = new Pago;
                    $model->load([$model->nombreDeClase => $modelData]);
                    $this->Pagos[$i] = $model;
                }

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

        $arreglo['Pagos'] = [];
        foreach ($this->Pagos as $index => $model) {
            $arreglo['Pagos'][] = $model->toJson();
        }

        return $arreglo;
    }
}
