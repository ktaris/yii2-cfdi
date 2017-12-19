<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\catalogos;

class CatalogoException extends \Exception
{
    /**
     * @return string nombre bonito de la excepción
     */
    public function getName()
    {
        return 'Error en lectura de un catálogo de CFDI 3.3.';
    }
}
