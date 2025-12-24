<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::first();
        return view('landing', compact('settings'));
    }

    public function update(Request $request)
    {
        // Validasi hanya 4 field
        $request->validate([
            'hero_title'      => 'required|string|max:255',
            'hero_subtitle'   => 'required|string|max:500',
            'stat_percentage' => 'required|string|max:20',
            'daily_sales'     => 'required|string|max:20',
        ]);

        $settings = SiteSetting::firstOrNew();
        $settings->hero_title      = $request->hero_title;
        $settings->hero_subtitle   = $request->hero_subtitle;
        $settings->stat_percentage = $request->stat_percentage;
        $settings->daily_sales     = $request->daily_sales;
        $settings->save();

        // Kembalikan JSON untuk AJAX
        return response()->json([
            'success' => true,
            'message' => 'Perubahan berhasil disimpan!',
            'data'    => $settings
        ]);
    }
}