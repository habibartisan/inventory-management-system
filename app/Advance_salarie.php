<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance_salarie extends Model
{
    protected $fillable=[ 'user_id',  'att_date',  'att_year',  'attendence',  'month',  'edit_date'
    ];
}
