<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
        $validatedData = $request->validated();

        $category = Product::create($validatedData);

        return response()->json(['message' => 'Produk berhasil disimpan', 'data' => $category], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $products)
    {
        $product = Product::findOrFail($products->id);

        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
        
        return response()->json(['message' => 'Produk yang anda cari: ', 'data' => $product], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, Product $products)
    {
        $products->update($request->validated());
        return response()->json(['message' => 'Produk berhasil diupdate', 'data' => $products], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $products)
    {
        $products->delete();

        return response()->json(['message' => 'Produk berhasil dihapus'], 200);
    }
}
