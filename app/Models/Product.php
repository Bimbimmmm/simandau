<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'is_available',
        'is_deleted',
        'user_id',
        'school_operator_id'
    ];

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function productAvailabilities()
    {
      return $this->hasMany('App\Models\ProductAvailability', 'id');
    }

    public function productImages()
    {
      return $this->hasMany('App\Models\ProductImage', 'id');
    }

    public function schoolOperator()
    {
      return $this->belongsTo('App\Models\SchoolOperator', 'school_operator_id');
    }

    public function carts()
    {
      return $this->hasMany('App\Models\Cart', 'id');
    }

}
