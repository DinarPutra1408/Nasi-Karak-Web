<?php

use Illuminate\Support\Facades\Route;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AboutSlideController;

// 1. Route untuk Halaman Depan (Landing Page)
Route::get('/', function () {
    $settings = SiteSetting::first();
    return view('landing', compact('settings'));
})->name('landing'); // Tambahkan name route

// 2. Route untuk Halaman Kontak
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

// 3. Route untuk Halaman Detail Menu Produk
Route::get('/menu/nasi-karak-original', function () {
    return view('detail-menu-satu');
})->name('menu.original');

// 4. Route untuk Admin Edit Site
Route::get('/admin/site', function () {
    $settings = SiteSetting::first();
    return view('admin.site-edit', compact('settings'));
})->name('admin.edit'); // Tambahkan name route

Route::post('/admin/site', function (Request $request) {
    $settings = SiteSetting::first();
    
    // Jika data belum ada, buat baru
    if (!$settings) {
        $settings = new SiteSetting();
    }
    
    $settings->update([
        'hero_title'      => $request->hero_title,
        'hero_subtitle'   => $request->hero_subtitle,
        'stat_percentage' => $request->stat_percentage,
        'daily_sales'     => $request->daily_sales,
    ]);

    return redirect('/admin/site')->with('success', 'Data berhasil diperbarui!');
})->name('admin.update'); // Tambahkan name route

// 5. Route untuk Admin Edit About Slide
Route::post('/admin/about-slides/update', [AboutSlideController::class, 'update'])
    ->name('admin.about-slides.update');