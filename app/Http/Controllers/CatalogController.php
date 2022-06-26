<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use Illuminate\View\View;

class CatalogController extends Controller
{
    /**
     * @param Category|null $category
     * @return View
     */
    public function categoryPage(Category $category = null): View
    {
        if ($category) {
            $products = Product::whereCategoryId($category->id)->with('images')->get();
            return view('pages.catalog_page', ['route' => route('product_page', ['product' => '==slug==']), 'data' => $category, 'products' => $products]);
        } else {
            $categories = Category::wherePublished(1)->get();
            return view('pages.catalog_list', ['entries' => $categories, 'route_name' => 'category_page', 'type' => 'category']);
        }
    }

    /**
     * @param Material|null $material
     * @return View
     */
    public function materialPage(Material $material = null): View
    {
        if ($material) {
            $products = Product::whereMaterialId($material->id)->with('images')->get();
            return view('pages.catalog_page', ['route' => route('product_page', ['product' => '==slug==']), 'data' => $material, 'products' => $products]);
        } else {
            $materials = Material::wherePublished(1)->get();
            return view('pages.catalog_list', ['entries' => $materials, 'route_name' => 'material_page', 'type' => 'material']);
        }
    }
}
