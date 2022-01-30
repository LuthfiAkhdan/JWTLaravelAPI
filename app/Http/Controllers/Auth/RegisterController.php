<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        request()->validate([
            'name' => ['string', 'required'],
            'username' => ['alpha_num', 'required', 'min:3', 'max:25', 'unique:users'],
            'email' => ['email', 'required', 'unique:users'],
            'password' => ['required', 'min:6']
        ]);

        User::create([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'password' => Hash::make(request('password'))
        ]);

        return response('Thanks, you are registered.');
    }
}
