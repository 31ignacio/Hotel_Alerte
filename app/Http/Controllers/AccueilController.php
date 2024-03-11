<?php

namespace App\Http\Controllers;
use App\Models\Client;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //

    public function index(){

        $clients = Client::orderBy('created_at', 'desc')->get();

        return view('Accueil/index',compact('clients'));
    }

    public function contact(){


        return view('Accueil/contact');
    }
}
