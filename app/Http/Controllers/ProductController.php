<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * @return View
     */
    public function productPage(): View
    {
        return view('pages.product_page');
    }
}
