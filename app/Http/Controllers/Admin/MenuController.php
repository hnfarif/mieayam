<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
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
        $menu = Menu::all();

        return view('admin.tabel_master.menu', ['menu' => $menu]);
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

            'nama_menu' => 'required',
            'harga_menu' => 'required',
            'jenis_menu' => 'required',
            'stock' => 'required',
            'gambar_menu' => 'required|image|mimes:jpeg,png,jpg'

        ]);

        // Menu::create($request->all());

        if ($request->hasFile('gambar_menu')) {
            $file = $request->file('gambar_menu');
            $name = $file->getClientOriginalName();
            $file->move(\base_path() . "/public/data_images", $name);

            $menu = new Menu();
            $menu->nama_menu = $request->nama_menu;
            $menu->harga_menu = $request->harga_menu;
            $menu->jenis_menu = $request->jenis_menu;
            $menu->stock = $request->stock;
            $menu->gambar_menu = $name;

            $menu->save();
        }

        return redirect()->back()->with('status', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return $menu;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return $menu;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, Menu $menu)
    {

        if ($request->hasFile('gambar_menu')) {
            $file = $request->file('gambar_menu');
            $name = $file->getClientOriginalName();
            $file->move(\base_path() . "/public/data_images", $name);

            Menu::where('id', $menu->id)->update([

                'nama_menu' => $request->nama_menu,
                'harga_menu' => $request->harga_menu,
                'jenis_menu' => $request->jenis_menu,
                'stock' => $request->stock,
                'gambar_menu' => $name
            ]);
        } else {
            Menu::where('id', $menu->id)->update([

                'nama_menu' => $request->nama_menu,
                'harga_menu' => $request->harga_menu,
                'jenis_menu' => $request->jenis_menu,
                'stock' => $request->stock
            ]);
        }

        return redirect('admin/menu')->with('status', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Menu::destroy($menu->id);

        return redirect()->back()->with('status', 'Data Berhasil Dihapus!');
    }
}
