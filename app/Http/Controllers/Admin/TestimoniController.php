<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimoni;

class TestimoniController extends Controller
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
        $testimoni = Testimoni::all();

        return view('admin.tabel_master.testimoni', ['testimoni' => $testimoni]);
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

            'id_user' => 'required',
            'isi_testimoni' => 'required'

        ]);

        Testimoni::create($request->all());

        return redirect()->back()->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $testimoni)
    {
        return $testimoni;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimoni $testimoni)
    {
        return $testimoni;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        Testimoni::where('id', $testimoni->id)->update([

            'id_user' => $request->id_user,
            'isi_testimoni' => $request->isi_testimoni

        ]);

        return redirect()->back()->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        Testimoni::destroy($testimoni->id);

        return redirect()->back()->with('status', 'Data Berhasil Dihapus!');
    }
}
