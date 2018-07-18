<?php

namespace Onwuasoanya\Contactify\Models;

use Illuminate\Database\Eloquent\Model;

class Contactify extends Model
{
    protected $fillable = [
        'id',
        'key_indexes',
        'key_value_pairs'
    ];
}
