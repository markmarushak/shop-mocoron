<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPhoto extends Model
{
    protected $fillable = [
        'product_id',
        'path',
        'order'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function delete()
    {
        dd('photo');
        parent::delete(); // TODO: Change the autogenerated stub
    }

}
