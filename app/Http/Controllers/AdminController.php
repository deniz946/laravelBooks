<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
    	//AQUI QUIERO QUE SE PUEDA VER EN UNA PAGINA CON TAB LAS DIFERENTES OPCIONES DE ADMIN
    	return view('admin.admin');
    }
}
