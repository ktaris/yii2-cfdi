<?php

/**
 * @copyright Copyright (c) 2017 Carlos Ramos
 * @package ktaris-cfdi
 * @version 0.1.0
 */

namespace ktaris\cfdi\catalogos\base;

use ktaris\cfdi\catalogos\Catalogo;

class UsoCFDI extends Catalogo
{
    protected $_data = [
        'G01' => 'Adquisición de mercancias',
        'G02' => 'Devoluciones, descuentos o bonificaciones',
        'G03' => 'Gastos en general',
        'I01' => 'Construcciones',
        'I02' => 'Mobilario y equipo de oficina por inversiones',
        'I03' => 'Equipo de transporte',
        'I04' => 'Equipo de computo y accesorios',
        'I05' => 'Dados, troqueles, moldes, matrices y herramental',
        'I06' => 'Comunicaciones telefónicas',
        'I07' => 'Comunicaciones satelitales',
        'I08' => 'Otra maquinaria y equipo',
        'D01' => 'Honorarios médicos, dentales y gastos hospitalarios.',
        'D02' => 'Gastos médicos por incapacidad o discapacidad',
        'D03' => 'Gastos funerales.',
        'D04' => 'Donativos.',
        'D05' => 'Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).',
        'D06' => 'Aportaciones voluntarias al SAR.',
        'D07' => 'Primas por seguros de gastos médicos.',
        'D08' => 'Gastos de transportación escolar obligatoria.',
        'D09' => 'Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.',
        'D10' => 'Pagos por servicios educativos (colegiaturas)',
        'P01' => 'Por definir',
    ];

    public function getNombre()
    {
        return 'Uso de CFDI';
    }
}
