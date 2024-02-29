<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\createUsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //
      //
      public function login()
      {
          return view('Auth.login');
      }
  
      public function handleLogin(AuthRequest $request)
      {
          //dd($request);
          $email=$request->email;

          $credentials = $request->only(['email', 'password']);
          //dd($credentials);
          if (Auth::attempt($credentials)) {
              return redirect()->route('hotel.profil');
          } else {

              return redirect()->back()->with('error_msg', 'Paramètre de connexion non reconnu');
          }
          $user = Auth::user();
          //dd($user);
  
          return view('layouts.master', compact('user'));
  
      }
    
}
