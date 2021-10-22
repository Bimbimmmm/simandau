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
}
