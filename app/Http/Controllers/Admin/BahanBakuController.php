<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BahanBaku;

class BahanBakuController extends Controller
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
        $bahanbaku = BahanBaku::all();
        return view('admin.tabel_master.bahanbaku', ['bahanbaku' => $bahanbaku]);
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

        $request->validate([

            'nama_bahan_baku' => 'required',
            'stok' => 'required',
            'satuan' => 'required'

        ]);

        BahanBaku::create($request->all());

        return redirect()->back()->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BahanBaku $bahanBaku)
    {
        return $bahanBaku;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BahanBaku $bahanbaku)
    {
        return $bahanbaku;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BahanBaku $bahanbaku)
    {
        BahanBaku::where('id', $bahanbaku->id)->update([

            'nama_bahan_baku' => $request->nama_bahan_baku,
            'stok' => $request->stok,
            'satuan' => $request->satuan

        ]);

        return redirect()->back()->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BahanBaku $bahanbaku)
    {
        BahanBaku::destroy($bahanbaku->id);

        return redirect()->back()->with('status', 'Data Berhasil Dihapus!');
    }
}
