<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $table = 'bank_account';

    protected $primaryKey = 'id';

    protected $fillable = [
        'bank_name',
        'owner_name',
        'account_number',
        'user_id',
        'school_operator_id',
        'bank_icon',
        'is_deleted'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function schoolOperator()
    {
      return $this->belongsTo('App\Models\SchoolOperator', 'school_operator_id');
    }
}
