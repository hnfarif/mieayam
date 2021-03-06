<?php

namespace App\Http\Controllers\User;

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
        return view('user.menu', ['menu' => $menu]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function jumlahItem(Request $request)
    // {
    //     $jml = $request->get('total');
    //     $sum  = 0;
    //     $arr = [];
    //     foreach ($jml as $key => $ttl) {

    //         if (isset($ttl[1])) {

    //             array_push($arr, $key);
    //         }
    //     }
    //     $sum = count($arr);

    //     return $sum;
    // }

    public function productSummary(Request $request)
    {
        $data = [
            "jumlah" => $request->jumlah,
            "id" => $request->id,
            "nama" => $request->nama,
            "harga" => $request->harga,
            "gambar" => $request->gambar

        ];

        $dataCart = [];

        if (session()->has('menu')) {
            $menu = session('menu');
            foreach ($menu as $item) {

                if ($request->id == $item['id']) {

                    $item['jumlah'] = $item['jumlah'] + $request->jumlah;
                    session(['update' => true]);
                }

                array_push($dataCart, $item);
            }
            if (!session()->has('update')) {
                array_push($dataCart, $data);
            }
            session()->forget('update');
        } else {
            array_push($dataCart, $data);
        }

        session(['menu' => $dataCart]);

        return redirect('/cart');
    }
}
