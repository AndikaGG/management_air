<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Kebanyakan sistem templating memuat templat dari disk. Di sini Anda dapat menentukan
    | serangkaian jalur yang harus diperiksa untuk pandangan Anda. Tentu saja
    | jalur tampilan Laravel yang biasa telah didaftarkan untuk Anda.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | Opsi ini menentukan di mana semua templat Blade yang dikompilasi akan berada
    | disimpan untuk aplikasi Anda. Biasanya, ini ada di dalam penyimpanan
    | direktori. Namun, seperti biasa, Anda bebas mengubah nilai ini.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
