<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\hotel;


class ClientController extends Controller
{
    //
    public function index(){

        $clients = Client::orderBy('created_at', 'desc')->get();

        return view('Clients/index',compact('clients'));

    }

    public function create()
    {
        return view('Clients.create');
    }

    public function store(Client $client, Request $request){

        try{
            $user = Auth::user();
            $user_id=$user->id;

            $hotels = hotel::where('user_id', $user->id)->first();
            //dd($hotels);

            $client->nom = $request->nom;
            $client->telephone = $request->telephone;
            $client->pays = $request->pays;
            $client->description= $request->description;
            $client->dateArriver = $request->dateArriver;
            $client->dateDepart = $request->dateDepart;
            $client->hotel_id=$hotels->id;

            $client->save();

            return back()->with('success_message', 'Le client a été signalé avec succès.');

        } catch (Exception $e) {
            dd($e);
            return new Response(500);
        }

    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('Clients.show', compact('client'));
    }


}
