<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sections: plots
    |--------------------------------------------------------------------------
    */
    'administration'    => 'Datos de configuración: Para los nives administrador y editor',
    'assign'            => 'Listado de parcelas sin usuario',
    'crop'              => 'Información del cultivo',
    'date'              => sections('crops.date'),
    'framework'         => 'Marco de plantación',
    'framework:min'     => 'Marco',
    'framework:x'       => 'Separación entre líneas',
    'framework:y'       => 'Distancia entre cepas',
    'loading'           => icon('alert') . ' Seleccione un cliente para cargar el módulo de cultivo',
    'plot'              => 'Información de la parcela',
    'percent'           => trans('units.percent:alt'),
    'quantity'          => 'Nº de cepas',
    'title'             => 'Parcela',
    'title:plural'      => 'Parcelas',
    'type'              => sections('crop_variety_types.title'),
];