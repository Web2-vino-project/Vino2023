<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable = [
        'user_id',
        'bottle_id',
        'quantity'
    ];

    public function bottle()
    {
        return $this->belongsTo(Bottle::class);
    }
    
}
