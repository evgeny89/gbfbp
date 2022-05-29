<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * @return View
     */
    public function home(): View
    {
        $categories = Category::wherePublished(1)->get();
        $materials = Material::wherePublished(1)->get();
        return view('pages.home_page', [
            'categories' => view('partials.catalog_list', [
                'entries' => $categories,
                'route_name' => 'category_page',
                'type' => 'category'
            ]),
            'materials' => view('partials.catalog_list', [
                'entries' => $materials,
                'route_name' => 'material_page',
                'type' => 'material'
            ])
        ]);
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
