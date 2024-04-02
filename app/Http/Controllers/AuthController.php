<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function checkStatus(Request $request){
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only($this->username(), 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->status == 'disabled') {
                Auth::logout();
                throw ValidationException::withMessages([
                    $this->username() => [trans('Your account is disabled.')],
                ])->redirectTo(route('login'));
            }
            return $this->sendLoginResponse($request);
        }

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }
}
