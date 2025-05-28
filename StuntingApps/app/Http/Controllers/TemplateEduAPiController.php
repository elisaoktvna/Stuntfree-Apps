<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateEdukasi;

class TemplateEduAPiController extends Controller
{
    public function getAll()
{
    $templates = TemplateEdukasi::all()->map(function ($template) {
        return [
            'id' => $template->id,
            'judul' => $template->judul,
            'content' => $template->content,
            'kategori' => $template->kategori,
            // 'image_url' => $template->image ? asset('storage/' . $template->image) : null,
            'image_url' => $template->image
        ];
    });

    return response()->json([
        'success' => true,
        'data' => $templates,
    ]);
}

}
