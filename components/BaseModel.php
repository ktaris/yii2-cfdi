<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\components;

use yii\base\Model;

class BaseModel extends Model
{
    /**
     * Obtiene el nombre de la clase para su uso en la carga de datos
     * hacia los modelos.
     * Diseñada para leer desde el XML sin tener que meter el nombre
     * de la clase al crear el arreglo de datos.
     * Obtenido de https://github.com/yiisoft/yii2/issues/1256
     *
     * @return string nombre de la clase sin el namespace.
     */
    public function getNombreDeClase()
    {
        return (new \ReflectionClass($this))->getShortName();
    }

    public function toJson()
    {
        $arreglo = [];

        foreach ($this->atributosPropiosParaJson() as $index => $atributo) {
            $arreglo[$atributo] = $this->$atributo;
        }

        return $arreglo;
    }

    public function getAtributosDeNodo()
    {
        $arreglo = [];

        foreach ($this->atributosPropiosParaJson() as $index => $atributo) {
            if (isset($this->$atributo)) {
                $arreglo[$atributo] = $this->$atributo;
            }
        }

        return $arreglo;
    }
}
