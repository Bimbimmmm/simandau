<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentItem extends Model
{
    use HasFactory;
    protected $table = 'payment_items';

    protected $primaryKey = 'id';

    protected $fillable = [
        'payment_id',
        'cart_id'
    ];

    public function payment()
    {
      return $this->belongsTo('App\Models\Payment', 'payment_id');
    }

    public function cart()
    {
      return $this->belongsTo('App\Models\Cart', 'cart_id');
    }
}
