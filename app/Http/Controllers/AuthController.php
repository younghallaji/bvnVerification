<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function userLogin(Request $request)
    {
        try {
            $result = $this->authService->userLogin($request);

            if ($result) {
                return redirect()->intended('/dashboard');
            }

            return redirect()->back()->withErrors(['message' => 'Invalid login credentials']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['message' => $th->getMessage()]);
        }
    }

    // Logout 
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
