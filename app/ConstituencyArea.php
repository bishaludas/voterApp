<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConstituencyArea extends Model
{
    use SoftDeletes;

    protected $fillable = ['ward_id', 'name'];

    public function ward(){
    	return $this->belongsTo(Ward::class);
    }
}
