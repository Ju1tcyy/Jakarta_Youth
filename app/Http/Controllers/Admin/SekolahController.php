<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $organisasi = Organisasi::with('user')->latest()->paginate(10);
        return view('admin.organisasi.index', compact('organisasi'));
    }

    public function show($id)
    {
        $organisasi = Organisasi::with('user')->findOrFail($id);
        return view('admin.organisasi.show', compact('organisasi'));
    }

    public function edit($id)
    {
        $organisasi = Organisasi::with('user')->findOrFail($id);
        return view('admin.organisasi.edit', compact('organisasi'));
    }

    public function update(Request $request, $id)
    {
        $organisasi = Organisasi::findOrFail($id);
        
        $validated = $request->validate([
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        $organisasi->update($validated);

        return redirect()->route('sekolah.show', $id)
            ->with('success', 'Nilai berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->delete();
        
        return redirect()->route('sekolah.index')
            ->with('success', 'Data organisasi berhasil dihapus');
    }
}
