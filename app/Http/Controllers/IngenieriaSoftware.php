<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IngenieriaSoftware extends Controller
{
    function viewInicio()
    {
        return view('Proyecto5to.inicio');
    }

    function viewInicioLogin()
    {
        return view('Proyecto5to.inicioLogin');
    }

    function viewPerfil()
    {
        return view('Proyecto5to.perfil');
    }

    function viewChat()
    {
        return view('Proyecto5to.chat');
    }

    function viewFotosPerfil()
    {
        return view('Proyecto5to.fotosperfil');
    }

    function viewInicioSesion()
    {
        return view('Proyecto5to.inicioSesion');
    }

    function viewRegistrarse()
    {
        return view('Proyecto5to.registrarse');
    }

    function viewVerPerfil()
    {
        return view('Proyecto5to.verPerfil');
    }

    function viewCambioFoto()
    {
        return view('Proyecto5to.cambioFoto');
    }

    function viewSeleccionFoto()
    {
        return view('Proyecto5to.seleccionFoto');
    }
}
