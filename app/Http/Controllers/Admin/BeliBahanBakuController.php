<?php

namespace App\Http\Controllers\Admin;

use App\BahanBaku;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pembelian;

class BeliBahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pembelian = Pembelian::all();
        $bahanbaku = BahanBaku::all();

        return view('admin.tabel_transaksi.pembelian', ['pembelian' => $pembelian, 'bahanbaku' => $bahanbaku]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'id_bahan_baku' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'total_harga' => 'required'

        ]);

        Pembelian::create([
            'id_bahan_baku' => $request->id_bahan_baku,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'total_harga' => $request->total_harga
        ]);

        return redirect()->back()->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        return $pembelian;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        return $pembelian;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        Pembelian::where('id', $pembelian->id)->update([

            'id_bahan_baku' => $request->id_bahan_baku,
            'jumlah' => $request->jumlah,
            'satuan' => $request->satuan,
            'total_harga' => $request->total_harga

        ]);

        return redirect()->back()->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        Pembelian::destroy($pembelian->id);

        return redirect()->back()->with('status', 'Data Berhasil Dihapus!');
    }
}
