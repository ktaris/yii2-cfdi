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

class CFDI extends Comprobante
{
    // ==================================================================
    //
    // Modelos asociados.
    //
    // ------------------------------------------------------------------

    public $Emisor;
    public $Receptor;
    public $Conceptos;

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
    }

    public function load($data, $formName = null)
    {
        $loaded = parent::load($data, $formName);

        $loaded &= $this->Emisor->load($data);
        $loaded &= $this->Receptor->load($data);
        $loaded &= $this->loadConceptos($data);

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
}
