<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\components;

trait ImpuestosTrait
{
    public function getTieneImpuestos()
    {
        return ($this->tieneTraslados || $this->tieneRetenciones);
    }

    public function getTieneTraslados()
    {

        return (!empty($this->Impuestos) && !empty($this->Impuestos->Traslados));
    }

    public function getTieneRetenciones()
    {
        return (!empty($this->Impuestos) && !empty($this->Impuestos->Retenciones));
    }

    public function getCantidadDeTraslados()
    {
        if (!$this->tieneTraslados) {
            return 0;
        }

        return count($this->traslados);
    }

    public function getCantidadDeRetenciones()
    {
        if (!$this->tieneRetenciones) {
            return 0;
        }

        return count($this->retenciones);
    }

    public function getCantidadDeImpuestos()
    {
        return $this->cantidadDeTraslados + $this->cantidadDeRetenciones;
    }

    public function getTraslados()
    {
        if ($this->tieneTraslados) {
            return $this->Impuestos->Traslados;
        }

        return null;
    }

    public function getRetenciones()
    {
        if ($this->tieneRetenciones) {
            return $this->Impuestos->Retenciones;
        }

        return null;
    }
}
