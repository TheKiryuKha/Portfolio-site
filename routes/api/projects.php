<?php

declare(strict_types=1);

Route::get('/', 'index')->name('index');
Route::post('/', 'store')->name('store');
Route::patch('/{project}', 'update')->name('update');
