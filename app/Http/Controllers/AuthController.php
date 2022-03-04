<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * @return View
     */
    public function register(): View
    {
        return view('pages.register_page');
    }

    /**
     * @param RegistrationRequest $request
     * @return RedirectResponse
     */
    public function registration(RegistrationRequest $request): RedirectResponse
    {
        $user = User::create($request->all());

        auth()->login($user);

        return redirect()->route('home');
    }
}
