<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\base;

use ktaris\cfdi\components\BaseModel;
use ktaris\cfdi\base\CfdiRelacionado;

class CfdiRelacionados extends BaseModel
{
    public $TipoRelacion;
    public $CfdiRelacionados;

    public function rules()
    {
        return [
            [['TipoRelacion'], 'safe'],
        ];
    }

    public function load($data, $formName = null)
    {
        if (empty($data) || empty($data['CfdiRelacionados'])) {
            return false;
        }

        parent::load($data);

        // Lectura de CFDI relacionados.
        $this->CfdiRelacionados = [];
        if (!empty($data['CfdiRelacionados']['CfdiRelacionados'])) {
            foreach ($data['CfdiRelacionados']['CfdiRelacionados'] as $i => $m) {
                $model = new CfdiRelacionado;
                $model->load([$model->nombreDeClase => $m]);

                $this->CfdiRelacionados[] = $model;
            }
        }

        return true;
    }

    protected function atributosPropiosParaJson()
    {
        return [
            'TipoRelacion',
        ];
    }

    public function toJson()
    {
        $arreglo = parent::toJson();

        if (!empty($this->CfdiRelacionados)) {
            $arreglo['CfdiRelacionados'] = [];
            foreach ($this->CfdiRelacionados as $index => $model) {
                $arreglo['CfdiRelacionados'][] = $model->toJson();
            }
        }

        return $arreglo;
    }
}
