<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * @return View
     */
    public function cartPage(): View
    {
        return view('pages.user_cart');
    }
}
