<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemplateEdukasi;
use Illuminate\Support\Facades\Storage;

class TemplateEdukasiController extends Controller
{
    public function index(){
    $templates = TemplateEdukasi::all();
        return view('template_edukasi.template_edukasi', compact('templates'));
    }

     public function create()
    {
        return view('template_edukasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:150',
            'konten' => 'required',
            'kategori' => 'required|in:stunting,normal,tall',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul', 'konten', 'kategori']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('image', 'public');
            $data['image'] = $path;
        }

        TemplateEdukasi::create($data);
        return redirect()->route('templateedukasi.index')->with('success', 'Template edukasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $template = TemplateEdukasi::findOrFail($id);
        return view('template_edukasi.edit', compact('template'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:150',
            'konten' => 'required',
            'kategori' => 'required|in:stunting,normal,tall',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $template = TemplateEdukasi::findOrFail($id);
        $data = $request->only(['judul', 'konten', 'kategori']);

        if ($request->hasFile('image')) {
            if ($template->image && Storage::disk('public')->exists($template->image)) {
                Storage::disk('public')->delete($template->image);
            }
            $path = $request->file('image')->store('image', 'public');
            $data['image'] = $path;
        }

        $template->update($data);
        return redirect()->route('templateedukasi.index')->with('success', 'Template edukasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $template = TemplateEdukasi::findOrFail($id);
        if ($template->image && Storage::disk('public')->exists($template->image)) {
            Storage::disk('public')->delete($template->image);
        }
        $template->delete();
        return redirect()->route('templateedukasi.index')->with('success', 'Template edukasi berhasil dihapus.');
    }
}
