<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Alert;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'namaProduk'=>'required',
            'ktr'=>'required',
            'harga'=>'required',
            'qty'=>'required',
            'img'=>'mimes:png,jpg,jpeg',
        ]);
        $image_path = '';
        if($request->hasFile('img')){
            $image_path = $request->file('img')->store('pro', 'public');
        }
        Produk::create([
            'namaProduk'=>$request->input('namaProduk'),
            'ktr'=>$request->input('ktr'),
            'harga'=>$request->input('harga'),
            'qty'=>$request->input('qty'),
            'img'=>$image_path,
        ]);
        Alert::success('Selamat', 'Berhasil Menyimpan Data Produk');
        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk, $id)
    {
        //
        $produk = Produk::find($id);
        return view('admin.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produk $produk, $id)
    {
        //
        $request->validate([
            'namaProduk'=>'required',
            'ktr'=>'required',
            'harga'=>'required',
            'qty'=>'required',
            'img'=>'mimes:png,jpg,jpeg',
        ]);
        $image_path = '';
        if($request->hasFile('img')){
            $image_path = $request->file('img')->store('pro', 'public');
        }
        if($image_path == '') {
            $produk = Produk::find($id);
            $produk->namaProduk = $request->input('namaProduk');
            $produk->ktr = $request->input('ktr');
            $produk->harga = $request->input('harga');
            $produk->qty = $request->input('qty');
            $produk->save();
        }else {
            $produk = Produk::find($id);
            $produk->namaProduk = $request->input('namaProduk');
            $produk->ktr = $request->input('ktr');
            $produk->harga = $request->input('harga');
            $produk->qty = $request->input('qty');
            $produk->img = $image_path;
            $produk->save();
        }
        Alert::success('Selamat', 'Berhasil Mengubah Data Produk');
        return redirect()->route('produk.index');
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $produk = Produk::find($id)->delete();
        Alert::success('Selamat', 'Berhasil Menghapus Data Produk');
        return redirect()->route('produk.index');
    }

    public function cart() {
        return view('cart.index');
    }

    public function addToCart($id) {
        $produk = Produk::findOrFail($id);
        $cart = session()->get('cart'[]);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "namaProduk" => $produk->namaProduk,
                "img" => $produk->img,
                "harga" => $produk->harga,
                "qty" => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
}
