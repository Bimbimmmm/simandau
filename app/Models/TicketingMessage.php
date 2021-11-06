<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketingMessage extends Model
{
    use HasFactory;
    protected $table = 'ticketing_message';

    protected $primaryKey = 'id';

    protected $fillable = [
        'message',
        'file',
        'ticketing_id',
        'user_id'
    ];

    public function ticketing()
    {
      return $this->belongsTo('App\Models\Ticketing', 'ticketing_id');
    }
    
    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

}
