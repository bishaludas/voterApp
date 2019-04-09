<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nep_name', 'eng_name', 'dob', 'sex','citizenship_no', 'father_name', 'mother_name',
        'husband_wife', 'image_path', 'state_id', 'district_id','vdc_municipality_id',
        'ward_id', 'constituency_id', 'rep_assembly_id', 'state_assembly_id', 'nep_date', 'eng_date',
        'voter_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function provience(){
        return $this->belongsTo(State::class, 'state_id');
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function repAssembly(){
        return $this->belongsTo(RepresentativeAssembly::class, 'rep_assembly_id');
    }

    public function stateAssembly(){
        return $this->belongsTo(StateAssembly::class, 'state_assembly_id');
    }

    public function vdcMinicipality(){
        return $this->belongsTo(MunicipalityVdc::class, 'vdc_municipality_id');
    }

    public function ward(){
        return $this->belongsTo(Ward::class, 'ward_id');
    }

     public function pollingLocation(){
        return $this->belongsTo(ConstituencyArea::class, 'constituency_id');
    }
}
