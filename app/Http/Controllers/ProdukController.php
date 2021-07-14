<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Produk;
use Illuminate\Http\Request;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rows = Produk::where('nama_produk','LIKE', '%' . $request->input('q') . '%')->get();
        return $rows;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function simpan(Request $request)
    {

        $p = new Produk();
        $p->id_produk = $request->id_produk;
        $p->nama_produk = $request->nama_produk;
        $p->tipe_produk = $request->tipe_produk;
        $p->stok = $request->stok;
        $p->harga = $request->harga;
        $p->gambar = $request->gambar;
        $p->status_produk = $request->status_produk;
        $p->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProdukModel  $produkModel
     * @return \Illuminate\Http\Response
     */
    public function detail($id_produk)
    {
        return Produk::find($id_produk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProdukModel  $produkModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukModel $produkModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProdukModel  $produkModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukModel $produkModel)
    {
        //
    }
}
