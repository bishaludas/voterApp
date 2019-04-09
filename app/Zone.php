<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
	use SoftDeletes;

    protected $fillable = ['state_id', 'name'];

    public function provience(){
    	return $this->belongsTo(State::class, 'state_id');
    }

    public function districts(){
    	return $this->hasMany(District::class);
    }
}
