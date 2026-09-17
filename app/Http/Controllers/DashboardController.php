<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Client;

class DashboardController extends Controller
{
    public function index()
    {
        return view('index', [
            'totalUsuarios'  => User::count(),
            'totalProductos' => Product::count(),
            'totalClientes'  => Client::count(),
        ]);
    }
}
