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

    /**
     * @return View
     */
    public function about(): View
    {
        return view('pages.about_page');
    }

    /**
     * @return View
     */
    public function rulesSeller(): View
    {
        return view('pages.rules_seller_page');
    }

    /**
     * @return View
     */
    public function rulesSettlements(): View
    {
        return view('pages.rules_settlements_page');
    }

    /**
     * @return View
     */
    public function howMakeOrder(): View
    {
        return view('pages.how_order_page');
    }

    /**
     * @return View
     */
    public function payment(): View
    {
        return view('pages.payment_page');
    }
}
