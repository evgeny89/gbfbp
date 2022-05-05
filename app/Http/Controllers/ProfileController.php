<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\CreateShopRequest;
use App\Http\Requests\ProfileDataRequest;
use App\Http\Requests\ProfilePhotoRequest;
use App\Models\PaymentCard;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
        return view('pages.user_shop', ['user' => User::with('shop')->find(Auth::id())]);
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
     * @return RedirectResponse
     */
    public function createUserShop(CreateShopRequest $request): RedirectResponse
    {
        Shop::create($request->only(['name', 'user_id']));
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param Shop $shop
     * @return RedirectResponse
     */
    public function updateUserShop(Request $request, Shop $shop): RedirectResponse
    {
        if (!Gate::allows('update-shop', $shop)) {
            abort(403);
        }

        $shop->update($request->only('name'));
        return redirect()->back();
    }

    /**
     * @param CreateProductRequest $request
     * @return RedirectResponse
     */
    public function createProduct(CreateProductRequest $request): RedirectResponse
    {
        $shop = Shop::find($request->only('shop_id'));

        if(!Gate::check('update-shop', $shop)) {
            abort(403);
        }

        $product = Product::create($request->all());

        $product->images->createMany($request->allFiles());

        return redirect()->back();
    }

    public function updateProduct()
    {

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
