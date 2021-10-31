<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolOperator extends Model
{
    use HasFactory;

    protected $table = 'school_operator';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'school_id',
        'is_active',
        'is_deleted'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function school()
    {
      return $this->belongsTo('App\Models\ReferenceSchool', 'school_id');
    }

    public function products()
    {
      return $this->hasMany('App\Models\Product', 'id');
    }

    public function bankAccounts()
    {
      return $this->hasMany('App\Models\BankAccount', 'id');
    }
}
