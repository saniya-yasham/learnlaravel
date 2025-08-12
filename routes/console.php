<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');

//register
Schedule::command('test')->everyMinute();
Schedule::command('daily-mail')->when(function () {
    return now()->isSameDay('2026-06-01');
});

// php artisan make:command Test
// signature = 'test'
// Log line added in handle method
// Register in routes/console.php
// php artisan schedule:work