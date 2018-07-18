<?php

namespace Onwuasoanya\Contactify\Models;

use Illuminate\Database\Eloquent\Model;

class Contactify extends Model
{
    protected $fillable = [
        'id',
        'email',
        'mobile',
        'subject',
        'name',
        'message',
        'keys',
        'key_value_pair'
    ];
}
