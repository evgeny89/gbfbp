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
            'profileLink' => '#',
            'favoriteLink' => '#',
            'purchasesLink' => '#',
            'shopLink' => '#',
            'heartIcon' => asset('/images/svg/heart-black.svg'),
            'packageIcon' => asset('/images/svg/package-black.svg'),
            'showcaseIcon' => asset('/images/svg/showcase-black.svg'),
            'logoutLink' => route('logout'),
        ]);
    }
}
