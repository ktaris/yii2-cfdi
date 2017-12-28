<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\complementoconcepto;

use ktaris\cfdi\components\BaseModel;

class ComplementoConcepto extends BaseModel
{
    public $InstitucionesEducativas;

    /**
     * Este objeto se encarga de cargar los posibles complementos que
     * puede tener un concepto.
     * Al menos, tiene acceso al {@link ktaris\cfdi\complementoconcepto\InstitucionesEducativas}.
     * @param  array  $data     datos del concepto, por si tiene complementos.
     * @param  string $formName nombre del formulario o modelo leído.
     * @return boolean          determina si se cargaron datos.
     */
    public function load($data, $formName = null)
    {
        if (empty($data['ComplementoConcepto'])) {
            return false;
        }

        $data = $data['ComplementoConcepto'];

        if (!empty($data['InstitucionesEducativas'])) {
            $this->InstitucionesEducativas = new InstitucionesEducativas;
            $this->InstitucionesEducativas->load($data);
        }

        return true;
    }

    public function toJson()
    {
        $arreglo = [];

        foreach ($this->listaDeComplementosSoportados as $index => $complemento) {
            $propiedad = 'tiene'.$complemento;
            if ($this->$propiedad) {
                $arreglo[$complemento] = $this->$complemento->toJson();
            }
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

    public function getTieneInstitucionesEducativas()
    {
        return $this->getTiene('InstitucionesEducativas');
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
            'InstitucionesEducativas',
        ];
    }
}
