<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'product_id',
        'qty',
        'is_checkouted'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function product()
    {
      return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function paymentItems()
    {
      return $this->hasMany('App\Models\PaymentItem', 'id');
    }
}
