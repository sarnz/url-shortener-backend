<?php

use App\Http\Controllers\API\ShortURLController;

Route::get('/shorturls', [ShortURLController::class, 'getShortURLs']);
Route::post('/shorturls/generate',[ShortURLController::class,'store' ]);
Route::get('/redirectpage/{code}', [ShortURLController::class,'redirectlink' ]);
?>