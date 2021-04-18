<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'product_id', 'user_id', 'price', 'quantity',
    ];

    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
