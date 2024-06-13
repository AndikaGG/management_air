<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Hal pertama yang akan kita lakukan adalah membuat instance aplikasi Laravel baru
| yang berfungsi sebagai "perekat" untuk semua komponen Laravel, dan merupakan
| wadah IoC untuk sistem yang mengikat semua bagian.
|
*/

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
|Selanjutnya, kita perlu mengikat beberapa antarmuka penting ke dalam wadah
| kami akan dapat menyelesaikannya bila diperlukan. Kernel melayani
| permintaan masuk ke aplikasi ini dari web dan CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| Skrip ini mengembalikan contoh aplikasi. Contohnya diberikan kepada
| skrip pemanggil sehingga kita dapat memisahkan pembuatan instance
| dari menjalankan aplikasi secara aktual dan mengirimkan respons.
|
*/

return $app;
