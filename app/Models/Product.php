<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use softDeletes;

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'sku',
        'price',
        'description',
        'single_count',
        'product_list_count',
        'updated_by',
        'deleted_by'
    ];

    /**
     * @return HasOne
     */
    public function image() : HasOne
    {
        return $this->hasOne(ProductImage::class, 'product_id');
    }

    /**
     * @return HasMany
     */
    public function bids() : HasMany
    {
        return $this->hasMany(Bid::class, 'product_id');
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($product) {
            $product->image()->delete();
        });
    }
}
