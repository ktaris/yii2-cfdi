<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\catalogos;

use yii\base\Component;
use ktaris\cfdi\catalogos\CatalogoException;

abstract class Catalogo extends Component
{
    abstract public function getNombre();

    public function getData()
    {
        return $this->_data;
    }

    public function getDescripcion($clave)
    {
        return $this->_data[$clave];
    }

    public static function descripcion($clave)
    {
        $clase = get_called_class();
        $obj = new $clase;

        if (!array_key_exists ($clave, $obj->data)) {
            throw new CatalogoException('No se encontró la clave "'.$clave.'" en el catálogo '.$obj->nombre);
        }

        return $obj->getDescripcion($clave);
    }
}
