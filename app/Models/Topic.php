<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    use HasFactory;
    
    protected $guarded = array('id)');

    public static $rules = array(
        'title' => 'required',
        'body' => 'required',

    );

    public function genres(){
        return $this->belongsToMany('App\Models\Genre')->withTimestamps();
    }
    
}
