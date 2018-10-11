<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complemento;

use ktaris\cfdi\components\BaseModel;

class Complemento extends BaseModel
{
    public $TimbreFiscalDigital;
    public $ComercioExterior;
    public $Pagos;

    /**
     * Este objeto se encarga de cargar los posibles complementos que
     * puede tener un CFDI.
     * Al menos, tiene acceso al {@link ktaris\cfdi\complementos\TimbreFiscalDigital}.
     * @param  array  $data     datos del CFDI, por si tiene complementos.
     * @param  string $formName nombre del formulario o modelo leído.
     * @return boolean          determina si se cargaron datos.
     */
    public function load($data, $formName = null)
    {
        if (empty($data['Complemento'])) {
            return false;
        }

        $data = $data['Complemento'];

        if (!empty($data['TimbreFiscalDigital'])) {
            $this->TimbreFiscalDigital = new TimbreFiscalDigital;
            $this->TimbreFiscalDigital->load($data);
        }

        if (!empty($data['ComercioExterior'])) {
            $this->ComercioExterior = new ComercioExterior;
            $this->ComercioExterior->load($data['ComercioExterior']);
        }

        if (!empty($data['Pagos'])) {
            $this->Pagos = new Pagos;
            $this->Pagos->load($data['Pagos']);
        }

        return true;
    }

    public function toJson()
    {
        $arreglo = [];

        if ($this->tieneComercioExterior) {
            $arreglo['ComercioExterior'] = $this->ComercioExterior->toJson();
        }

        if ($this->tienePagos) {
            $arreglo['Pagos'] = $this->Pagos->toJson();
        }

        return $arreglo;
    }

    // ==================================================================
    //
    // Funciones para verificar presencia de complementos soportados.
    //
    // ------------------------------------------------------------------

    public function getTieneComplemento()
    {
        $tieneComplemento = false;

        foreach ($this->listaDeComplementosSoportados as $index => $complemento) {
            $propiedad = 'tiene'.$complemento;
            if ($this->$propiedad) {
                $tieneComplemento = true;
                break;
            }
        }

        return $tieneComplemento;
    }

    public function getTieneTimbreFiscalDigital()
    {
        return $this->getTiene('TimbreFiscalDigital');
    }

    public function getTieneComercioExterior()
    {
        return $this->getTiene('ComercioExterior');
    }

    public function getTienePagos()
    {
        return $this->getTiene('ComercioExterior');
    }

    // ==================================================================
    //
    // Funciones de procesamiento interno para procesar complementos.
    //
    // ------------------------------------------------------------------

    protected function getTiene($complemento)
    {
        if (empty($this->$complemento)) {
            return false;
        }

        return true;
    }

    protected function getListaDeComplementosSoportados()
    {
        return [
            'TimbreFiscalDigital',
            'ComercioExterior',
            'Pagos',
        ];
    }
}
