<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenceSchoolType extends Model
{
    use HasFactory;
    protected $table = 'reference_school_type';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'is_province'
    ];

    public function referenceSchools()
    {
      return $this->hasMany('App\Models\ReferenceSchool', 'id');
    }
}
