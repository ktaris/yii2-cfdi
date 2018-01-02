<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\catalogos\base;

use ktaris\cfdi\catalogos\Catalogo;

class TipoDeComprobante extends Catalogo
{
    protected $_data = [
        'I' => 'Ingreso',
        'E' => 'Egreso',
        'T' => 'Traslado',
        'N' => 'Nómina',
        'P' => 'Pago',
    ];

    public static function nombre()
    {
        return 'Tipo de Comprobante';
    }
}
