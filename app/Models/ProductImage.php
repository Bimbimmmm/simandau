<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $table = 'product_image';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'file'
    ];

    public function product()
    {
      return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
