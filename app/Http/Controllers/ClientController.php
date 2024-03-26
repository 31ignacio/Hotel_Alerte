<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\hotel;
use Exception;

class ClientController extends Controller
{
    //
    public function index(){

        $clients = Client::orderBy('created_at', 'desc')->paginate(4);

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
            // $request->validate([
            //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // ]);
    
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $client->photo = $imageName;
        //dd($client);

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

    public function recherche(Request $request)
    {
        //dd($request);
        $nom = $request->input('nom');
        $hotel = $request->input('hotel');
        //dd($nom);

        $query = Client::query();

        if ($nom) {
            $query->where('nom', 'like', "%$nom%");
        }

        if ($hotel) {
            $query->whereHas('hotel', function ($q) use ($hotel) {
                $q->where('nom', 'like', "%$hotel%");
            });
        }

        // Trier les résultats par ordre décroissant en fonction de la date de création
        $query->orderBy('created_at', 'desc');

        // Exécuter la requête
        $clients = $query->paginate(4);

        // // Paginer les résultats obtenus
        // $perPage = 8;
        // $currentPage = LengthAwarePaginator::resolveCurrentPage();
        // $currentPageItems = $clients->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // // Créer une instance de LengthAwarePaginator
        // $clients = new LengthAwarePaginator(
        //     $currentPageItems,
        //     $clients->count(),
        //     $perPage,
        //     $currentPage,
        //     ['path' => LengthAwarePaginator::resolveCurrentPath()]
        // );
        //return back()->with(compact('clients'));
        return view('Clients/index',compact('clients'));

    }

    public function destroy(Client $client)
    {
        // Supprimer le signalement
        $client->delete();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success_messagee', 'Le signalement a été annulé avec succès.');
    }


}
