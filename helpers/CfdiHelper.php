<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\helpers;

use Yii;

class CfdiHelper
{
    public static function rfcEsGenerico($rfc)
    {
        // XAXX010101000 - Público en general.
        // XEXX010101000 - Clientes en el extranjero.
        $rfcsGenericos = ['XAXX010101000', 'XEXX010101000'];

        if (in_array($rfc, $rfcsGenericos)) {
            return true;
        }

        return false;
    }

    public static function importe($valor, $decimalesMaximos = 6, $decimalesAMostrar = 0)
    {
        $nuevoValor = round($valor, $decimalesMaximos);

        return $nuevoValor;
    }
}
