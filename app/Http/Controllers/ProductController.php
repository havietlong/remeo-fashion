<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\products;
use App\Models\product_categories;
use App\Models\product_types;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return products::orderBy('id', 'DESC')->get();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function showProdByTypes(string $id)
    {

        $product_type_id = $id;
        $products = products::where('product_type_id', $product_type_id)->get();
        switch ($products) {
            case true:
                return response()->json($products);
            default:
                return "Không tìm thấy sản phẩm";
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showProdByCats(string $id)
    {
        $products = products::where('product_categories_id', $id)->get();
        return $products;
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
        $newProduct = new products;
        $newProduct->name = null;
        $newProduct->price = null;
        $newProduct->description = null;
        $newProduct->product_type_id = $request->input("product_type_id");
        $newProduct->product_categories_id = $request->input("product_category_id");
        $newProduct->save();

        return $newProduct;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the product by its ID
        $product = products::find($id);

        if (!$product) {
            // If the product with the provided ID is not found, return a 404 response
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Return the product details
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $existingProduct = products::find($id);
        switch ($existingProduct) {
            case true:
                $existingProduct->name = $request->products["name"];
                $existingProduct->price = $request->products["price"];
                $existingProduct->description = $request->products["description"];
                $existingProduct->product_type_id = $request->products["product_type_id"];
                $existingProduct->save();
                return $existingProduct;
            default:
                return "Không tìm thấy sản phẩm";
        }
    }

    public function modifyProduct(Request $request, string $id)
    {
        $product = products::find($id);
        if ($product) {
            if ($product) {
                // Update the product data with the data from the request
                $product->update($request->all());
                return response()->json(['message' => 'Updated product']);
            } else {
                return response()->json(['message' => 'Product not found'], 404);
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingProduct = products::find($id);
        switch ($existingProduct) {
            case true:
                $existingProduct->delete();
                return "Đã xóa sản phẩm";
            default:
                return "Không tìm thấy sản phẩm";
        }
    }
}
