<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complemento;

use ktaris\cfdi\complemento\cce11\ComercioExterior as BaseComercioExterior;
use ktaris\cfdi\complemento\cce11\Emisor;
use ktaris\cfdi\complemento\cce11\Receptor;
use ktaris\cfdi\complemento\cce11\Mercancia;

class ComercioExterior extends BaseComercioExterior
{
    // ==================================================================
    //
    // Modelos asociados.
    //
    // ------------------------------------------------------------------
    public $Emisor;
    public $Propietarios;
    public $Receptor;
    public $Destinatario;
    public $Mercancias;

    // ==================================================================
    //
    // Lectura de datos.
    //
    // ------------------------------------------------------------------

    public function load($data, $formName = null)
    {
        $loaded = parent::load([$this->nombreDeClase => $data], $formName);

        $loaded &= $this->loadEmisor($data);
        $loaded &= $this->loadReceptor($data);
        $loaded &= $this->loadMercancias($data);

        return $loaded;
    }

    protected function loadEmisor($data)
    {
        if (!empty($data['Emisor'])) {
            $this->Emisor = new Emisor;
            return $this->Emisor->load($data['Emisor']);
        }

        return false;
    }

    protected function loadReceptor($data)
    {
        if (!empty($data['Receptor'])) {
            $this->Receptor = new Receptor;
            return $this->Receptor->load($data['Receptor']);
        }

        return false;
    }

    protected function loadMercancias($data)
    {
        $loaded = false;

        if (empty($this->Mercancias)) {
            if (!empty($data['Mercancias'])) {
                foreach ($data['Mercancias'] as $i => $modelData) {
                    $model = new Mercancia;
                    $model->load([$model->nombreDeClase => $modelData]);
                    $this->Mercancias[$i] = $model;
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

        if (!empty($this->Emisor)) {
            $arreglo['Emisor'] = $this->Emisor->toJson();
        }

        if (!empty($this->Receptor)) {
            $arreglo['Receptor'] = $this->Receptor->toJson();
        }

        // Mercancias.
        $arreglo['Mercancias'] = [];
        foreach ($this->Mercancias as $index => $model) {
            $arreglo['Mercancias'][] = $model->toJson();
        }

        return $arreglo;
    }
}
