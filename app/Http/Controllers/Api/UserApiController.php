<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserApiController extends Controller
{
    public function getPopupData(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'userName' => Auth::user()->name,
            'avatar' => Auth::user()->small_avatar,
            'profileLink' => route('profile_page'),
            'favoriteLink' => route('favorite_page'),
            'purchasesLink' => '#',
            'shopLink' => '#',
            'logoutLink' => route('logout'),
        ]);
    }
}
