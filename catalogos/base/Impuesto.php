<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\catalogos\base;

use ktaris\cfdi\catalogos\Catalogo;

class Impuesto extends Catalogo
{
    protected $_data = [
        '001' => 'ISR',
        '002' => 'IVA',
        '003' => 'IEPS',
    ];

    public function getNombre()
    {
        return 'Impuesto';
    }
}
