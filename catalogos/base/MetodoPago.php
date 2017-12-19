<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\catalogos\base;

use ktaris\cfdi\catalogos\Catalogo;

class MetodoPago extends Catalogo
{
    protected $_data = [
        'PUE' => 'Pago en una sola exhibición',
        'PPD' => 'Pago en parcialidades o diferido',
    ];

    public function getNombre()
    {
        return 'Método de Pago';
    }
}
