<?php

namespace Onwuasoanya\Contactify\Models;

/**
 * This file is part of Contactify,
 * a feedback management solution for Laravel.
 *
 * @license MIT
 * @package Onwuasoanya\Contactify
 */

use Illuminate\Database\Eloquent\Model;

class Contactify extends Model
{
    protected $fillable = [
        'id',
        'key_indexes',
        'key_value_pairs'
    ];
}
