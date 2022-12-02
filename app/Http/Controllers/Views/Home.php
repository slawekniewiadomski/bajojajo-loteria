<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Home extends Controller
{
    public function index()
    {
        return Inertia::render('Home',[
            'test' => 'Lol'
        ]);
    }
    
    public function show($hash){
        return Inertia::render('Show', ['hash' => $hash]);
    }
}
