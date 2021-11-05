<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingMail extends Model
{
    use HasFactory;
    protected $table = 'incoming_mail';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'full_name',
        'institution',
        'position',
        'title',
        'importance_level',
        'contact',
        'file',
        'mac_address',
        'ip_address'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
}
