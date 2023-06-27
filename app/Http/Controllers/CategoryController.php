<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'namaKategori'=>'required',
        ]);
        Category::create([
            'namaKategori'=>$request->input('namaKategori')
        ]);
        Alert::success('Selamat', 'Berhasil Memasukkan Data Category');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category, $id)
    {
        //
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category, $id)
    {
        //
        $request->validate([
            'namaKategori'=>'required',
        ]);
        $category = Category::find($id);
        $category->namaKategori = $request->input('namaKategori');
        $category->save();
        Alert::success('Selamat', 'Berhasil Mengubah Data Category');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category, $id)
    {
        //
        Category::find($id)->delete();
        return redirect()->route('kategori.index');
    }
}
