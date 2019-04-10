<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RepresentativeAssembly extends Model
{
	use SoftDeletes;
	
    protected $fillable = ['name','representative_no', 'district_id', 'description'];

    public function district(){
    	return $this->belongsTo(District::class);
    }
}
