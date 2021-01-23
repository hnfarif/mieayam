<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;
use App\Penjualan;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
        $menu = session('menu');
        $total = 0;
        foreach ($menu ?? '' as $item) {

            $total += $item['jumlah'] * $item['harga'];
        }

        return view('user.cart', ['menu' => $menu, 'total' => $total]);
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
        $menu = session('menu');
        $cartOrder = [];
        foreach ($menu as $item) {
            Penjualan::create([
                'id_user' => Auth::user()->id,
                'id_menu' => $item['id'],
                'jumlah' => $item['jumlah'],
                'total_harga' => $item['jumlah'] * $item['harga']
            ]);

            if ($item['id']) {
                unset($item);
            } else {
                array_push($cartOrder, $item);
            }
        }
        session(['menu' => $cartOrder]);

        return redirect('/cart')->with('status', 'Berhasil Memesan Mie');;
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

    public function deleteCart($id)
    {

        $menu = session('menu');

        $cartUpdate = [];

        foreach ($menu as $item) {
            if ($id == $item['id']) {
                unset($item);
            } else {
                array_push($cartUpdate, $item);
            }
        }

        session(['menu' => $cartUpdate]);

        return redirect('/cart');
    }

    // public function dataTotal(Request $request)
    // {
    //     $total = $request->get('total');
    //     $level = $request->get('level');

    //     $totalhrg = new Cart();

    //     $totalhrg = $totalhrg->hitungTotal($total, $level);

    //     return $totalhrg;
    // }
}
