<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UserApiController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getPopupData(): JsonResponse
    {
        return response()->json([
            'userName' => Auth::user()->name,
            'avatar' => Auth::user()->small_avatar,
            'profileLink' => route('profile_page'),
            'favoriteLink' => route('favorite_page'),
            'purchasesLink' => route('orders_page'),
            'shopLink' => route('shop_page'),
            'logoutLink' => route('logout'),
        ]);
    }

    /**
     * @param SearchRequest $request
     * @return Collection
     */
    public function search(SearchRequest $request): Collection
    {
        return collect([
            'categories' => [
                'name' => 'Категории',
                'list' => $this->searchCategory($request->input('query')),
                'route' => route('category_page'),
            ],
            'materials' => [
                'name' => 'Материалы',
                'list' => $this->searchMaterial($request->input('query')),
                'route' => route('material_page'),
            ],
            'products' => [
                'name' => 'Товары',
                'list' => $this->searchProduct($request->input('query')),
                'route' => route('product_page'),
            ],
        ]);
    }

    /**
     * @param string $query
     * @return Collection
     */
    protected function searchCategory(string $query): Collection
    {
        return Category::query()
            ->select(['name', 'slug'])
            ->wherePublished(1)
            ->where('name', 'LIKE', "%{$query}%")
            ->get();
    }

    /**
     * @param string $query
     * @return Collection
     */
    protected function searchMaterial(string $query): Collection
    {
        return Material::query()
            ->select(['name', 'slug'])
            ->wherePublished(1)
            ->where('name', 'LIKE', "%{$query}%")
            ->get();
    }

    /**
     * @param string $query
     * @return Collection
     */
    protected function searchProduct(string $query): Collection
    {
        return Product::query()
            ->select(['name', 'slug'])
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->get();
    }
}
