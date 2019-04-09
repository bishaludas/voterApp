<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ward extends Model
{
    use SoftDeletes;

    protected $fillable = ['ref_id', 'name'];

    public function municipality(){
    	return $this->belongsTo(MunicipalityVdc::class, 'ref_id');
    }

    public function constituencyArea(){
    	return $this->hasMany(ConstituencyArea::class);
    }
}
