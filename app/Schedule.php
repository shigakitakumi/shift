<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'reply' => 'required',
        'user_id' => 'required',
        );
    public function shift()
    {
        return $this->belongsTo('App\Shift');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
