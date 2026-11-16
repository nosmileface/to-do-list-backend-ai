<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function show(): View
    {
        return view('auth.index');
    }

    public function login(LoginRequest $loginRequest): RedirectResponse
    {
        if (!auth()->attempt($loginRequest->validated())) {
            return back()->withErrors([
                'email' => 'Неверные e-mail или пароль.'
            ]);
        }

        $loginRequest->session()->regenerate();

        return redirect()
            ->route('tasks.index');
    }

    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.index');
    }
}
