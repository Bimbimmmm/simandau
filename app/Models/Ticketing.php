<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticketing extends Model
{
    use HasFactory;
    protected $table = 'ticketing';

    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'importance_level',
        'title',
        'is_finished',
        'user_id',
        'is_deleted'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function ticketing_messages()
    {
      return $this->hasMany('App\Models\TicketingMessage', 'id');
    }
}
