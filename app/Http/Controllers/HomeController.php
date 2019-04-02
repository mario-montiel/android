<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function __construct()
    {
         $this->middleware('inicioSesion');
    }

    function viewHome(){
    	return view('TalleresUTT.Home.home');
    }
}
