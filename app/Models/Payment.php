<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'notes',
        'status',
        'total_cost',
        'shipping_carrier',
        'shipping_cost',
        'is_payed',
        'payment_proof',
        'shipping_number',
        'is_finished',
        'is_pending',
        'pending_reason',
        'is_rejected',
        'reject_reason'
    ];

    protected $dates = [
      'date_shipped',
      'date_payed',
      'date_finished'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function paymentItems()
    {
      return $this->hasMany('App\Models\PaymentItem', 'id');
    }

}
