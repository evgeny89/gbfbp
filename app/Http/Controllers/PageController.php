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
    public function contactsPage(): View
    {
        return view('pages.contact_page');
    }

    /**
     * @return View
     */
    public function aboutPage(): View
    {
        return view('pages.about_page');
    }

    /**
     * @return View
     */
    public function rulesSellerPage(): View
    {
        return view('pages.rules_seller_page');
    }

    /**
     * @return View
     */
    public function rulesSettlementsPage(): View
    {
        return view('pages.rules_settlements_page');
    }

    /**
     * @return View
     */
    public function howMakeOrderPage(): View
    {
        return view('pages.how_order_page');
    }

    /**
     * @return View
     */
    public function paymentPage(): View
    {
        return view('pages.payment_page');
    }

    /**
     * @return View
     */
    public function deliveryPage(): View
    {
        return view('pages.delivery_page');
    }
}
