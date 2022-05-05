<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * @return View
     */
    public function home(): View
    {
        return view('pages.home_page');
    }

    /**
     * @return View
     */
    public function contacts(): View
    {
        return view('pages.contact_page');
    }
}
