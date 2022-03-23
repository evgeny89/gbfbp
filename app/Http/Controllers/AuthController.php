<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * @return View
     */
    public function loginPage(): View
    {
        return view('pages.login_page');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ])) {
            $request->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withInput()->withErrors([
            'email' => 'Комбинация логин/пароль не найдена в базе данных',
        ]);
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('home');
    }

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
