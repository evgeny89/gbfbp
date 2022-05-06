<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\CreateShopRequest;
use App\Http\Requests\ProfileDataRequest;
use App\Http\Requests\ProfilePhotoRequest;
use App\Models\Category;
use App\Models\Material;
use App\Models\PaymentCard;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | VIEWS
    |--------------------------------------------------------------------------
    */
    /**
     * @return View
     */
    public function profilePage(): View
    {
        $user = User::with('paymentCards')->find(Auth::id());
        return view('pages.profile_page', compact('user'));
    }

    /**
     * @return View
     */
    public function favoritePage(): View
    {
        return view('pages.favorite_page');
    }

    /**
     * @return View
     */
    public function ordersPage(): View
    {
        return view('pages.orders_page');
    }

    /**
     * @return View
     */
    public function shopPage(): View
    {
        $shop = User::find(Auth::id())->shop();
        return view('pages.user_shop', ['data' => collect([
            'shop' => $shop->with('products.images')->first(),
            'routes' => [
                'createShop' => route('create_shop'),
                'updateShop' => route('update_shop', ['shop' => $shop->first()]),
                'createItem' => route('create_product'),
                'updateItem' => route('update_product', ['product' => "=product="]),
                'getSelectValues' => route('product-select-data'),
            ],
        ])->toJson()]);
    }

    /*
    |--------------------------------------------------------------------------
    | ACTIONS
    |--------------------------------------------------------------------------
    */
    /**
     * @param ProfileDataRequest $request
     * @return RedirectResponse
     */
    public function saveUserData(ProfileDataRequest $request): RedirectResponse
    {
        $errors = $this->validateUserPrivateData($request);
        if (empty($errors)) {
            User::find(Auth::id())->update($request->only(['name', 'email', 'phone']));
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors($errors);
        }
    }

    /**
     * @param ProfilePhotoRequest $request
     * @return RedirectResponse
     */
    public function saveUserImage(ProfilePhotoRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->photo = $request->file('image');
        $user->save();
        return redirect()->back();
    }

    /**
     * @param PaymentCard $card
     * @return RedirectResponse
     */
    public function setFavoriteCard(PaymentCard $card): RedirectResponse
    {
        $user = Auth::user();
        if ($card->user_id === $user->id) {
            $user->update(['favorite_card_id' => $card->id]);
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['set-card' => 'Ошибка выбора основной карты']);
        }
    }

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
     * @param Request $request
     * @param Shop $shop
     * @return Shop
     */
    public function updateUserShop(Request $request, Shop $shop): Shop
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

        $product = Product::create($request->all());

        foreach ($request->file('file_name') as $file) {
            $photo = new ProductPhoto;
            $photo->file_name = $file;
            $photo->product_id = $product->id;
            $photo->save();
        }
        return $product;
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return Product
     */
    public function updateProduct(Request $request, Product $product): Product
    {
        if(!Gate::check('update-product', $product)) {
            abort(403);
        }

        $product->update($request->all());

        foreach ($request->file('file_name') as $file) {
            $photo = new ProductPhoto;
            $photo->file_name = $file;
            $photo->product_id = $product->id;
            $photo->save();
        }

        $product->fresh();
        return $product;
    }

    /**
     * @return string
     */
    public function getSelectValues(): string
    {
        return collect([
            'materials' => Material::all(),
            'categories' => Category::all(),
        ])->toJson();
    }

    /*
    |--------------------------------------------------------------------------
    | PROTECTED FUNCTIONS
    |--------------------------------------------------------------------------
    */
    /**
     * @param ProfileDataRequest $request
     * @return array
     */
    protected function validateUserPrivateData(ProfileDataRequest $request): array
    {
        $errors = [];
        $emailUser = User::whereEmail($request->input('email'))->first();
        $phoneUser = User::wherePhone($request->input('phone'))->first();

        if (!empty($emailUser) && $emailUser->id !== Auth::id()) {
            $errors['email'] = 'Это не ваш адрес';
        }

        if (!empty($phoneUser) && $phoneUser->id !== Auth::id()) {
            $errors['phone'] = 'Это не ваш телефон';
        }

        return $errors;
    }
}
