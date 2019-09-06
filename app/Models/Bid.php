<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $table = 'bid';
    protected $primaryKey = 'id';

    protected $fillable = [
        'email',
        'amount',
        'product_id',
    ];

   //add belongs to relationship
}
