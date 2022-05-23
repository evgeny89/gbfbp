<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use Illuminate\View\View;

class CategoryController extends Controller
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

    /**
     * @param Material $material
     * @return View
     */
    public function materialPage(Material $material): View
    {
        if ($material) {
            $products = Product::whereMaterialId($material->id)->get();
            return view('pages.category_page', ['category' => $material, 'products' => $products]);
        } else {
            $materials = Material::wherePublished(1)->get();
            return view('page.category_page', compact($materials));
        }
    }
}
