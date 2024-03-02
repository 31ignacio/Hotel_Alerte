<?php

namespace App\Http\Controllers;
use App\Models\hotel;
use App\Models\User;
use App\Models\Client;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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

            $user->name = $request->nom;
            $user->email = $request->email;
            $user->password =Hash::make($request->mdp);
            $user->save();
            //dd($user);
            $hotel->pays = $request->pays;
            $hotel->nom = $request->nom;
            $hotel->telephone = $request->telephone;
            $hotel->email= $request->email;
            $hotel->adresse = $request->adresse;
            $hotel->ifu = $request->ifu;
            $hotel->responsable=$request->responsable;
            $hotel->user_id=$user->id;

            $hotel->save();

           
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

         // Récupérer l'utilisateur connecté
         $user = Auth::user();
         //dd($user);
         $user_id=$user->id;

        $hotels = hotel::where('user_id', $user->id)->first();
        $hotel_id=$hotels->id;
        
         // Récupérer la somme du montantFinal pour l'utilisateur connecté et le rôle donné
         $hotels = hotel::where('user_id', $user->id)->first();
         $clients = Client::where('hotel_id', $hotel_id)
         ->orderBy('created_at', 'desc')
         ->get();

         // Paginer les résultats obtenus
        $perPage = 4;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $clients->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Créer une instance de LengthAwarePaginator
        $clients = new LengthAwarePaginator(
            $currentPageItems,
            $clients->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
            

        return view('Hotels/profil',compact('hotels','clients'));
    }

    public function updateProfil(hotel $hotel, Request $request){

        //dd($request->all());
                try {
            $hotel->id = $request->id;
            $hotel->nom = $request->nom;
            $hotel->pays = $request->pays;
            $hotel->adresse = $request->adresse;
            $hotel->ifu = $request->ifu;
            $hotel->responsable = $request->responsable;
            $hotel->telephone = $request->telephone;
            //dd($hotel);
            $hotel->update();
            //dd($hotel);
            return back()->with('success_message', 'Votre profil a été modifié avec succès');

        } catch (Exception $e) {
            dd($e);
        }


    }

    public function updateSignalement(client $client, Request $request){

        //dd($client);
        try {
            $client->update($request->all());
            return back()->with('success_messagee', 'Informations modifiées avec succès');
        } catch (Exception $e) {
            dd($e);
        }
    }
}
