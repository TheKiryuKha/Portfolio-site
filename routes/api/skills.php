<?php

declare(strict_types=1);

Route::get('/', 'index')->name('index');
Route::post('/', 'store')->name('store');
Route::patch('/{skill}', 'update')->name('update');
Route::delete('/{skill}', 'destroy')->name('destroy');
