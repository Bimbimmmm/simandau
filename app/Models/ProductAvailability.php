<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAvailability extends Model
{
    use HasFactory;
    protected $table = 'product_availability';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'product_id',
        'type',
        'stock'
    ];

    public function product()
    {
      return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
