<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateParticipant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Create extends Controller
{
    public function join(){
        
        return Inertia::render('Join');
    }
    
    public function store(CreateParticipant $request)
    {
        $validated = $request->validated();
        
        return Inertia::render('Join');
    }
}
