<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use App\Http\Services\Dashboard\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AuthService $auth;

    public function __construct(
        AuthService $authService
    )
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
        $this->auth = $authService;
    }

    public function _login() {
        return view('dashboard.site.auth.login');
    }

    public function login(LoginRequest $request) {
        return $this->auth->login($request);
    }

    public function logout() {
        return $this->auth->logout();
    }
}
