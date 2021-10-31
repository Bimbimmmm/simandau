<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $table = 'user_address';

    protected $primaryKey = 'id';

    protected $fillable = [
        'address',
        'city',
        'district',
        'village',
        'zip_code',
        'is_deleted',
        'user_id'
    ];
    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
}
