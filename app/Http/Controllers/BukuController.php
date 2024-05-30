<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('bukus.index', compact('bukus'));
    }

    public function create()
    {
        return view('bukus.create');
    }

    public function dashboard()
    {
        $bukus = Buku::all();
        return view('bukus.dashboard', compact('bukus'));
    }

    public function tentangkami()
    {
        return view('bukus.tentangkami');
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'isi' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->isi = $request->isi;

        if ($request->file('cover_image')) {
            $fileName = time() . '.' . $request->file('cover_image')->extension();
            $filePath = $request->file('cover_image')->move(public_path('images'), $fileName);
            $buku->cover_image = 'images/' . $fileName;
        }

        $buku->save();

        return redirect()->route('bukus.index');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('bukus.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'isi' => 'required',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->isi = $request->isi;

        if ($request->file('cover_image')) {
            if ($buku->cover_image && file_exists(public_path($buku->cover_image))) {
                unlink(public_path($buku->cover_image));
            }
            $fileName = time() . '.' . $request->file('cover_image')->extension();
            $filePath = $request->file('cover_image')->move(public_path('images'), $fileName);
            $buku->cover_image = 'images/' . $fileName;
        }

        $buku->save();

        return redirect()->route('bukus.index');
    }

    public function show($id)
{
    $buku = Buku::findOrFail($id);
    return view('bukus.show', compact('buku'));
}

public function search(Request $request)
{
    $query = $request->input('query');
    $bukus = Buku::where('judul', 'LIKE', "%$query%")
                  ->orWhere('pengarang', 'LIKE', "%$query%")
                  ->get();
    return view('bukus.index', compact('bukus', 'query'));
}


    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->cover_image && file_exists(public_path($buku->cover_image))) {
            unlink(public_path($buku->cover_image));
        }

        $buku->delete();

        return redirect()->route('bukus.index');
    }
}