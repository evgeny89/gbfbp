<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class CatalogController extends Controller
{
    /**
     * @param Category $category
     * @return View
     */
    public function categoryPage(Category $category): View
    {
        if ($category) {
            $products = Product::whereCategoryId($category->id)->get();
            return view('pages.category_page', ['category' => $category, 'products' => $products]);
        } else {
            $categories = Category::wherePublished(1)->get();
            return view('page.category_page', compact($categories));
        }
    }
}
