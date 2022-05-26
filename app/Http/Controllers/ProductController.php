<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @param Product $product
     * @return View
     */
    public function productPage(Product $product): View
    {
        return view('pages.product_page', ['product' => $product]);
    }
}
