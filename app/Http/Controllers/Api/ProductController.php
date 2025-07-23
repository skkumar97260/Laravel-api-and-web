<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // public function index()
    // {
    //     return response()->json(Product::all(), 200);
    // }

    public function index(Request $request)
    {
        $products = Product::all();
       return view('product', compact('products'));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->only(['name', 'description', 'price']));
        return response()->json(['message' => 'Product created', 'data' => $product], 201);
    }

    public function show(Request $request)
    {
        $id = $request->query('id');
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product, 200);
    }

    public function update(Request $request)
    {
        $id = $request->query('id');
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update($request->only(['name', 'description', 'price']));
        return response()->json(['message' => 'Product updated', 'data' => $product], 200);
    }

    public function destroy(Request $request)
    {
        $id = $request->query('id');
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted'], 200);
    }
}
