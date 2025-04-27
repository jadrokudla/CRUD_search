<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

use function Laravel\Prompts\progress;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('id', 'ASC')->paginate(8);

        return view('products.index', compact('products'));
    }



    public function search(Request $request)
    {
        if(!empty($request)){
            $search = $request->input('search');
        }

        $products = Product::where('name', 'like', "$search%")
        ->orWhere('detail', 'like', "$search%")
        ->paginate(5);

        return view('products.index', compact('products'));
    }

    public function create(Request $request)
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validAtrributes = $request->validate([
            'name' => 'required|string|min:7|max:300',
            'detail' => 'required|string|min:7|max:300',
        ]);

        Product::create($validAtrributes);


        return redirect()->route('products.index')->with('success', 'Product has been successfully created.');

    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update([
            'name' => $request->name,
            'detail' => $request->detail,
        ]);

        // dd($product->toArray());

        return redirect()->route('products.index')
        ->with('success', 'Product was  updated')
        ->with('product_id_created', $product->id);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product was deleted')->with('product_id_deleted', $product->id);
    }
}



