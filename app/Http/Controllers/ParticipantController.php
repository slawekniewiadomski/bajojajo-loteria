<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateParticipantRequest;
use App\Models\Lottery;
use App\Models\Participant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ParticipantController extends Controller
{
    
    public function __construct()
    {
    }
    
    public function join(Lottery $lottery, Participant $participant = null)
    {
        if(!$lottery->active){
            return redirect(route('lottery.show', $lottery->slug));
        }
        return Inertia::render("Participant/Join", [
            'participant' => $participant,
            'lottery' => $lottery->only(['id','active','name','slug'])
        ]);
    }
    
    public function create(Lottery $lottery, CreateParticipantRequest $request)
    {
        $validated             = $request->validated();
        $participant           = new Participant($validated);
        $participant->hash     = substr(md5(Str::random(8)), 0, 8);
        
        $lottery->participants()->save($participant);
        
        if($lottery->price_cap === null){
            $lottery->price_cap = $validated['price_cap'];
        }
        
        if($lottery->price_cap > $validated['price_cap']){
            $lottery->price_cap = $validated['price_cap'];
        }
        
        $lottery->save();
    
        return redirect()->route('participant.show', ['lottery' => $lottery->slug, 'participant' => $participant->hash]);
    }
    
    public function show(Lottery $lottery, Participant $participant)
    {
        $lottery->makeHidden(['participants']);
        return Inertia::render("Participant/Show", [
            'participant' => $participant,
            'lottery' => $lottery,
            'link' => URL::to('/') . '/' . $lottery->slug . '/' . $participant->hash,
            'draw' => $lottery->active ? null : Participant::where('hash', $participant->draw)->first()->name
        ]);
    }
}
