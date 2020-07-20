<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function account() {
        return view('account');
    }

    public function generateToken() {
        $random_token = Str::random(80);
        $utente_corrente = Auth::user();
        $utente_corrente->api_token = $random_token;
        $utente_corrente->save();
        return redirect()->route('admin.account');
    }
}
