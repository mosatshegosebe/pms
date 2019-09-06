<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use softDeletes;

    protected $table = 'product_image';
    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'filename',
        'mime',
        'updated_by',
        'deleted_by'
    ];

}
//add belong to relo
