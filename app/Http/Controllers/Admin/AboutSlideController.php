<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller; // ← WAJIB

class AboutSlideController extends Controller
{
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slider' => 'required|array|min:1',
            'slider.*.number' => 'required|string|max:5',
            'slider.*.title' => 'required|string|max:255',
            'slider.*.text' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors()
            ], 422);
        }

        AboutSlide::truncate();

        foreach ($request->input('slider') as $item) {
            AboutSlide::create([
                'number' => $item['number'],
                'title' => $item['title'],
                'content' => $item['text'], // ← pastikan kolom di DB: `content`
            ]);
        }

        $slides = AboutSlide::orderBy('id')->get()->map(function ($slide) {
            return [
                'number' => $slide->number,
                'title' => $slide->title,
                'text' => $slide->content,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Slider “Tentang Kami” berhasil diperbarui.',
            'slider' => $slides
        ]);
    }
}