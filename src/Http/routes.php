<?php

Route::get('/epaywrapper', 'Kondov\EpayWrapper\Http\EpayWrapperController@showForm');
Route::post('/epaywrapper/review', 'Kondov\EpayWrapper\Http\EpayWrapperController@sendRequest');
Route::get('/epaywrapper/callback/success', 'Kondov\EpayWrapper\Http\EpayWrapperController@successfulTransfer');
Route::get('/epaywrapper/callback/cancel', 'Kondov\EpayWrapper\Http\EpayWrapperController@cancelledTransfer');