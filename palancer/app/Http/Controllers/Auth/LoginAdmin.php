<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;


class LoginAdmin extends Controller
{

    public function __constructor(){
         
        $this->middleware("auth:admin");

    }
    
    public function index()
    { 

        return view("auth.adminLogin");
    }

    public function create(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $result = Auth::guard('admin')->attempt(
            $request->only('email', 'password'),
            $request->boolean('remember')
        );

        if (!$result) {

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
