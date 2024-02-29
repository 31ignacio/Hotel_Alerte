<?php

namespace App\Http\Controllers;
use App\Models\hotel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    //
    public function index(){


        return view('Hotels/index');
    }

    public function store(hotel $hotel, User $user, Request $request){

        //dd($request);
        try {
            $hotel->pays = $request->pays;
            $hotel->nom = $request->nom;
            $hotel->telephone = $request->telephone;
            $hotel->email= $request->email;
            $hotel->adresse = $request->adresse;
            $hotel->ifu = $request->ifu;
            $hotel->responsable=$request->responsable;

            $hotel->save();

            $user->name = $request->nom;
            $user->email = $request->email;
            $user->password =Hash::make($request->password);
            $user->save();

            return redirect()->route('hotel.accueil')->with('success_message', 'Votre inscription à été enregistré avec succès');

            // if($request->mdf != $request->cfmdp){

            //     return back()->with('success_message','Les mots de passe ne sont pas identiques');
            // }

            //dd($produit);
        } catch (Exception $e) {
            dd($e);
            return new Response(500);
        }
           
    }

    public function profil(){

        

        return view('Hotels/profil');
    }
}
