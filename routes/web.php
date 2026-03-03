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

Route::get('/dashboard-study', function () {
    return redirect('/dashboard-study/roadmap');
});

Route::prefix('dashboard-study')->group(function () {
    Route::get('/roadmap', function () { return view('lms.roadmap'); });
    Route::get('/ai-assistant', function () { return view('lms.ai-assistant'); });
    Route::get('/calendar', function () { return view('lms.calendar'); });
    Route::get('/clan', function () { return view('lms.clan'); });
    Route::get('/classes', function () { return view('lms.classes'); });
});
