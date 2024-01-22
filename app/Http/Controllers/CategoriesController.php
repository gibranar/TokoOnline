<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Http\Requests\StorecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;

class CategoriesController extends Controller
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
    public function store(StorecategoriesRequest $request)
    {
        $validatedData = $request->validated();

        $category = Categories::create($validatedData);

        return response()->json(['message' => 'Kategori berhasil disimpan', 'data' => $category], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(categories $categories)
    {
        $category = Categories::findOrFail($categories);

        // return view('categories.show', ['category' => $category]);
        return response()->json(['message' => 'Kategori yang anda cari: ', 'data' => $category], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoriesRequest $request, categories $categories)
    {
        $categories->update($request->validated());
        return response()->json(['message' => 'Kategori berhasil diupdate', 'data' => $categories], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $categories)
    {
        $categories->delete();

        return response()->json(['message' => 'Kategori berhasil dihapus'], 200);
    }
}
