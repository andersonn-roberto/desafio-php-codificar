<?php

namespace App\Http\Controllers;

use App\Deputado;
use Illuminate\Http\Request;

class DeputadoController extends Controller
{
    public function index()
    {
        return json_encode(Deputado::all());
    }
}
