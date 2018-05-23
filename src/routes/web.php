<?php
Route::prefix('database')->namespace('Arapel\DatabaseExporter\Controllers')->middleware('web')->group(function () {
    Route::get('/', 'ExportController@home');
    Route::post('/export', 'ExportController@export');
});
