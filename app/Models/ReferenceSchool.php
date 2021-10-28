<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenceSchool extends Model
{
    use HasFactory;

    protected $table = 'reference_school';

    protected $primaryKey = 'id';

    protected $fillable = [
        'school_name',
        'address',
        'city',
        'district',
        'village',
        'reference_school_type_id'
    ];

    public function referenceSchoolType()
    {
      return $this->belongsTo('App\Models\ReferenceSchoolType', 'reference_school_type_id');
    }

    public function schoolOperators()
    {
      return $this->hasMany('App\Models\SchoolOperator', 'id');
    }

}
