<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShopCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function categories()
    {
        $categories = ShopCategory::active()
            ->ordered()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Categories retrieved successfully',
            'data' => $categories
        ]);
    }

    public function categoryProducts($id)
    {
        $category = ShopCategory::with('products')
            ->active()
            ->findOrFail($id);

        $products = $category->products()->active()->ordered()->get();

        return response()->json([
            'success' => true,
            'message' => 'Category products retrieved successfully',
            'data' => $products
        ]);
    }

    public function products()
    {
        $products = Product::with('category')
            ->active()
            ->ordered()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Products retrieved successfully',
            'data' => $products
        ]);
    }

    public function show($id)
    {
        $product = Product::with('category')
            ->active()
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Product retrieved successfully',
            'data' => $product
        ]);
    }
}
