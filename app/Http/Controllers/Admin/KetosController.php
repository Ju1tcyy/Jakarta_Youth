<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ketos;
use Illuminate\Http\Request;

class KetosController extends Controller
{
    public function index()
    {
        $ketos = Ketos::latest()->paginate(10);
        return view('admin.ketos.index', compact('ketos'));
    }

    public function show($id)
    {
        $ketos = Ketos::findOrFail($id);
        return view('admin.ketos.show', compact('ketos'));
    }

    public function edit($id)
    {
        $ketos = Ketos::findOrFail($id);
        return view('admin.ketos.edit', compact('ketos'));
    }

    public function update(Request $request, $id)
    {
        $ketos = Ketos::findOrFail($id);
        
        $validated = $request->validate([
            'nilai' => 'required|integer|min:0|max:100',
        ]);

        $ketos->update($validated);

        return redirect()->route('ketos.show', $id)
            ->with('success', 'Nilai berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $ketos = Ketos::findOrFail($id);
        $ketos->delete();
        
        return redirect()->route('ketos.index')
            ->with('success', 'Data ketos berhasil dihapus');
    }
}
