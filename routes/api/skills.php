<?php

declare(strict_types=1);

Route::post('/', 'store')->name('store');
Route::patch('/{skill}', 'update')->name('update');
