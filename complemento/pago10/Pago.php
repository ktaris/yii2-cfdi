<?php

/**
 * @copyright Copyright (c) 2018 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.1
 */

namespace ktaris\cfdi\complemento\pago10;

class Pago extends BasePago
{
    // ==================================================================
    //
    // Nodos relacionados.
    //
    // ------------------------------------------------------------------
    public $DoctosRelacionados;

    public function load($data, $formName = null)
    {
        $loaded = parent::load($data, $formName);

        $data = current($data); // Elimina el nombre del modelo superior.

        $this->loadDocumentosRelacionados($data);

        return $loaded;
    }

    public function loadDocumentosRelacionados($data)
    {
        $loaded = false;

        if (empty($this->DoctosRelacionados)) {
            if (!empty($data['DoctosRelacionados'])) {
                $this->DoctosRelacionados = [];

                foreach ($data['DoctosRelacionados'] as $i => $modelData) {
                    $model = new DoctoRelacionado;
                    $model->load([$model->nombreDeClase => $modelData]);
                    $this->DoctosRelacionados[$i] = $model;
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

        if (!empty($this->DoctosRelacionados)) {
            foreach ($this->DoctosRelacionados as $index => $model) {
                $arreglo['DoctosRelacionados'][] = $model->toJson();
            }
        }

        return $arreglo;
    }
}
