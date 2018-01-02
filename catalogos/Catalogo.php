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
    abstract public static function nombre();

    public static function catalogo()
    {
        $arregloOut = [];
        $clase = self::className();
        $model = new $clase;
        foreach ($model->_data as $clave => $descripcion) {
            $arregloOut[$clave] = $clave.' - '.$descripcion;
        }

        return $arregloOut;
    }

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
        $clase = self::className();
        $obj = new $clase;

        if (!array_key_exists($clave, $obj->data)) {
            throw new CatalogoException('No se encontró la clave "'.$clave.'" en el catálogo '.$obj::nombre());
        }

        return $obj->getDescripcion($clave);
    }
}
