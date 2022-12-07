<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug','price_cap','active'
    ];
    protected $casts = [
        'active' => 'boolean'
    ];
    
    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
