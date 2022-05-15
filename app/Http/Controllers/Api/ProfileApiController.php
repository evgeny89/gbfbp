<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\CreateShopRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Shop;
use Illuminate\Support\Facades\Gate;

class ProfileApiController extends Controller
{
    /**
     * @param CreateShopRequest $request
     * @return Shop
     */
    public function createUserShop(CreateShopRequest $request): Shop
    {
        $shop = Shop::create($request->only(['name', 'user_id']));
        return $shop->with('products.images')->first();
    }

    /**
     * @param UpdateShopRequest $request
     * @param Shop $shop
     * @return Shop
     */
    public function updateUserShop(UpdateShopRequest $request, Shop $shop): Shop
    {
        if (!Gate::allows('update-shop', $shop)) {
            abort(403);
        }

        $shop->update($request->only('name'));
        $shop->fresh();
        return $shop->with('products.images')->first();
    }

    /**
     * @param CreateProductRequest $request
     * @return Product
     */
    public function createProduct(CreateProductRequest $request): Product
    {
        $shop = Shop::whereId($request->only('shop_id'))->first();

        if (!Gate::allows('update-shop', $shop)) {
            abort(403);
        }

        $product = Product::create($request->validated());

        foreach ($request->file('file_name') as $file) {
            $photo = new ProductPhoto;
            $photo->file_name = $file;
            $photo->product_id = $product->id;
            $photo->save();
        }

        return Product::whereId($product->id)->with('images')->first();
    }

    /**
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return Product
     */
    public function updateProduct(UpdateProductRequest $request, Product $product): Product
    {
        if(!Gate::check('update-product', $product)) {
            abort(403);
        }

        $product->update($request->validated());

        if ($request->file('file_name')) {
            foreach ($request->file('file_name') as $file) {
                $photo = new ProductPhoto;
                $photo->file_name = $file;
                $photo->product_id = $product->id;
                $photo->save();
            }
        }

        if ($request->delete_images) {
            foreach ($request->delete_images as $image) {
                ProductPhoto::whereId($image)->whereProductId($product->id)->first()->delete();
            }
        }

        $product->fresh();
        return Product::whereId($product->id)->with('images')->first();
    }

    /**
     * @param Product $product
     * @return bool
     */
    public function deleteProduct(Product $product): bool
    {
        return $product->delete();
    }

    /**
     * @return string
     */
    public function getSelectValues(): string
    {
        return collect([
            'materials' => Material::wherePublished(1)->get(),
            'categories' => Category::wherePublished(1)->get(),
        ])->toJson();
    }
}
