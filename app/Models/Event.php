<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = array('id)');

    public static $rules = array(
        'title' => 'required',
        'body' => 'required',

    );
}
