<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductFilterRequest $request, ProductFilter $filters)
    {
        $products = Product::with('category')
            ->filter($filters)
            ->paginate(10);

        return ProductResource::collection($products);
    }
}
