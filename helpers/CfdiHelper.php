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
    const RFC_PUBLICO_GENERAL = 'XAXX010101000';
    const RFC_EXTRANJERO = 'XEXX010101000';

    public static function rfcEsGenerico($rfc)
    {
        $rfcsGenericos = [self::RFC_PUBLICO_GENERAL, self::RFC_EXTRANJERO];

        if (in_array($rfc, $rfcsGenericos)) {
            return true;
        }

        return false;
    }

    /**
     * Se refiere a una función para convertir un número al formato de máximo seis decimales,
     * truncando en caso de siete, y ajustando los decimales a mostrar con un tercer parámetro.
     *
     * @param  float  $valor             número a ser convertido
     * @param  integer $decimalesMaximos  decimales máximos que acepta el número, truncando los demás
     * @param  integer $decimalesAMostrar decimales a mostrar, haciendo padding en caso de que falten
     *
     * @return string                     cadena con representación de número con decimales correctos
     */
    public static function importe($valor, $decimalesMaximos = 6, $decimalesAMostrar = -1)
    {
        // Primero, se trunca el valor a máximo $decimalesMaximos.
        $nuevoValor = round($valor, $decimalesMaximos);
        // Después, se agregan los ceros necesarios, si es que faltan decimales.
        if ($decimalesAMostrar > 0) {
            $decimalesExistentes = self::decimalesEnNumero($nuevoValor);
            // Si tiene menos decimales de los que se pretenden mostrar, hacemos el padding.
            if ($decimalesExistentes < $decimalesAMostrar) {
                $nuevoValor = self::agregarCeros($nuevoValor, $decimalesAMostrar - $decimalesExistentes);
            }
        }

        return $nuevoValor;
    }

    /**
     * Regresa el número de decimales que tiene un número flotante correspondiente a un importe.
     * Función basada en https://stackoverflow.com/a/2430144
     *
     * @param  float $valor número potencialmente flotante
     *
     * @return integer      cantidad de decimales presentes en el número.
     */
    public static function decimalesEnNumero($valor)
    {
        return strlen(substr(strrchr($valor, '.'), 1));
    }

    /**
     * Agrega la cantidad de ceros, definida por $cantidadDeCeros, al final de la cadena, que se presupone es un
     * número flotante.
     *
     * @param  float   $valor           valor al que se le agregarán ceros
     * @param  integer $cantidadDeCeros cantidad de ceros que se van a agregar
     * @return string  cadena con ceros agregados
     */
    public static function agregarCeros($valor, $cantidadDeCeros)
    {
        // Si es un valor entero (no tiene punto decimal), se agrega antes del padding.
        if (strpos($valor, '.') === false) {
            $valor = $valor.'.';
        }

        return $valor.str_repeat('0', $cantidadDeCeros);
    }
}
