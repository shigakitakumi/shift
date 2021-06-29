<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        );
    public function user()
    {
        return $this->hasMany('App\User');
    }
    
    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }
  }