<?php

namespace App\Http\Controllers\Products;

use App\Domain\Product\Product;
use Illuminate\Http\Request;

class ProductIndexController
{
    public function __invoke(Request $request)
    {
        $data = $request->all();
        $category = $request->input('category');
        $city = $request->get('city');
        $products = Product::query();

        $categories = Product::groupByRaw('category')
            ->pluck('category');
        $cities = Product::groupByRaw('city')
            ->pluck('city');

        if ($category && !is_null($category)) {
            $products->where('category', $category);
        }

        if ($city) {
            $products->whereIn('city', $city);
        }

        return view('products.index', [
            'products'   => $products->paginate(),
            'categories' => $categories,
            'cities'     => $cities,
            'selected'   => $category,
            'checked' => $city,
            'data' => $data,
        ]);
    }
}
