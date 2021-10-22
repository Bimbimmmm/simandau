<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'header_image',
        'content_image',
        'author',
        'is_deleted'
    ];
}
