<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Penjualan;

class PenjualanController extends Controller
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
        $penjualan = Penjualan::all();

        return view('admin.tabel_transaksi.penjualan', ['penjualan' => $penjualan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        return $penjualan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        return $penjualan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        Penjualan::where('id', $penjualan->id)->update([

            'id_user' => $request->id_user,
            'id_menu' => $request->id_menu,
            'jumlah' => $request->jumlah,
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
    public function destroy(Penjualan $penjualan)
    {
        Penjualan::destroy($penjualan->id);

        return redirect()->back()->with('status', 'Data Berhasil Dihapus!');
    }
}
