<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index() {
        $kategoris = Kategori::all();
        return view("kategori.index.index", compact("kategoris"));
    }
    public function formSubmit(Request $request, $method, $kode = 0) {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|unique:kategoris,kode',
        ]);
        if ($method == 'new') {
            $data_item = new Kategori;
            sleep(3);
        } else {
            $data_item = Kategori::where('kode', $kode)->first();
            $kode = $data_item->kode;
        }
        $data_item->nama = $request->nama;
        $data_item->kode = $request->kode;
        $data_item->save();

        return redirect('kategori');

    }
    public function formView($method, $kode = 0)
    {
        if ($method == 'new') {
            $item = [];
        } else {
            $item = Kategori::where('kode', $kode)->first();
        }
        $data['item'] = $item;
        $data['method'] = $method;
        return view('kategori.form.index', $data);
    }
    public function singleView($kode)
    {
        $data['data'] = Kategori::where('kode', $kode)->first();
        return view('kategori.single.index', data: $data);
    }
    public function delete($kode)
    {
        Kategori::where('kode', $kode)->delete();
        return redirect('kategori');
    }
    public function exportPDF($kode)
    {
        $kategori = Kategori::where('kode', $kode)->with('master_item')->first();
        
        // return view('kategori.pdf.index', data: compact('kategori'));
        $pdf = Pdf::loadView('kategori.pdf.index', compact('kategori'));
        return $pdf->download('kategori.pdf');
    }
}
