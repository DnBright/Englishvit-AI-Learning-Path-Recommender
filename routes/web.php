<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/live-class', function () {
    return view('paket.live_class');
});

Route::get('/learning-package', function () {
    return view('paket.learning_package');
});

Route::get('/certification-test', function () {
    return view('paket.certification_test');
});

Route::get('/one-on-one', function () {
    return view('paket.one_on_one');
});

Route::get('/pronunciation', function () {
    return view('paket.pronunciation');
});
