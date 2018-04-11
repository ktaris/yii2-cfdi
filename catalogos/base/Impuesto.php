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
    const ISR = '001';
    const IVA = '002';
    const IEPS = '003';

    protected $_data = [
        self::ISR => 'ISR',
        self::IVA => 'IVA',
        self::IEPS => 'IEPS',
    ];

    public static function nombre()
    {
        return 'Impuesto';
    }
}
