<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileDataRequest;
use App\Http\Requests\ProfilePhotoRequest;
use App\Models\PaymentCard;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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
        $shop = User::find(Auth::id())->shop()->with('products.images')->first();
        return view('pages.user_shop', ['data' => collect([
            'shop' => $shop,
            'routes' => [
                'createShop' => route('create_shop'),
                'updateShop' => route('update_shop', ['shop' => $shop ?? "=shop="]),
                'createItem' => route('create_product'),
                'updateItem' => route('update_product', ['product' => "=product="]),
                'deleteItem' => route('delete_product', ['product' => "=product="]),
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
