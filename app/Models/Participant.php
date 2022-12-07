<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Participant
 *
 * @property int                             $id
 * @property string                          $name
 * @property string                          $hash
 * @property int                             $lottery_id
 * @property string                          $draw
 * @property int                             $price_cap
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lottery        $lottery
 *
 */
class Participant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
    ];
    
    protected $hidden = [
        'draw','hash'
    ];
}
