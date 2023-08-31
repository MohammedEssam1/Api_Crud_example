<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        return view('products', ['products' => $products]);
    }


    public function create()
    {
        return view(route('products.create'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Product::create([
            'product_name' => $request['product_name'],
            'product_picture' => $imageName,
            'product_availability' => $request['product_availability'],
            'product_price' => $request['product_price'],
            'category_id' => $request['category_id'],
            'admin_id' => $request['admin_id'],
        ]);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('showproduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,Request $request)
    {
        $product = Product::find($id);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $imagePath = public_path('images/' . $product->product_picture);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $product->update([
            'product_name' => $request['product_name'],
            'product_picture' => $imageName,
            'product_availability' => $request['product_availability'],
            'product_price' => $request['product_price'],
            'category_id' => $request['category_id'],
            'admin_id' => $request['admin_id'],
        ]);
        return redirect()->route('product.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        return view('update', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $imagePath = public_path('images/' . $product->product_picture);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $product->delete();
        return redirect()->route('product.index');
    }
}
