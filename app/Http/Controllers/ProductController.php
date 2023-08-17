<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'CustomCode' => 'required|string',
            'ProductName' => 'required|string',
            'ProductSetor' => 'required|numeric',
            'ProductPrice' => 'required|numeric'
        ]);

        // Create a new Product instance
        $product = new Product();
        $product->prod_code = $validatedData['CustomCode'];
        $product->prod_name = $validatedData['ProductName'];
        $product->prod_setor = $validatedData['ProductSetor'];
        $product->prod_price = $validatedData['ProductPrice'];

        // Save the Product to the database
        $product->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
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
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
