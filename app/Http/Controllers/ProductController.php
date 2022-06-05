<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @param Product $product
     * @return View
     */
    public function productPage(Product $product): View
    {
        $reviews = Review::whereProductId($product->id)->get();
        return view('pages.product_page', ['product' => $product,
                                           'reviews' => $reviews]);

    }
}
