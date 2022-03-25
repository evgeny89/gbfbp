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
            'profileLink' => route('profile_page'),
            'favoriteLink' => '#',
            'purchasesLink' => '#',
            'shopLink' => '#',
            'logoutLink' => route('logout'),
        ]);
    }
}
