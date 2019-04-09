<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MunicipalityVdc extends Model
{
    use SoftDeletes;

    protected $fillable = ['type', 'name', 'district_id'];

    public function district(){
    	return $this->belongsTo(District::class);
    }
    
    public function wards(){
    	return $this->hasMany(Ward::class, 'ref_id');
    }
}
