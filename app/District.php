<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;

    protected $fillable = ['zone_id', 'name'];

    public function zone(){
    	return $this->belongsTo(Zone::class);
    }

    public function municipality(){
    	return $this->hasMany(MunicipalityVdc::class);
    }

    public function representativeAssembly(){
    	return $this->hasMany(RepresentativeAssembly::class);
    }

     public function stateAssembly(){
    	return $this->hasMany(StateAssembly::class);
    }
}
