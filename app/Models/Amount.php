<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    protected $fillable = [
        'amount',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
