<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return response()->json(['data'=>$products]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'price' => 'required',
            'picture'=>'required',
            'availability'=>'required',
            'category_id'=>'required|exists:categories,id',
        ]);
        try {
            $product =  Product::create($request->all());
            return response()->json(['data' => $product]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'server is not available now']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json(['data' => $product]);
        }
        return response()->json(['message' => 'product is not found']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(string $id, Request $request)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json(['data' => $product]);
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['data' => $product,'message'=>'product deleted successfully']);
        }
        return response()->json(['message' => 'product is not found']);
    }
}
