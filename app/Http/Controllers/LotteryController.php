<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Inertia\Inertia;

class LotteryController extends Controller
{
    
    public function __construct()
    {
    }
    public function index()
    {
        return Inertia::render('Lottery/Index',[
            'lotteries' => Lottery::all()
        ]);
    }
    
    public function show(Lottery $lottery){
       return Inertia::render('Lottery/Show', [
           'lottery' => $lottery->with('participants')->first()
           ]);
    }
}
