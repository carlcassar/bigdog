<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'telephone_number',
        'address',
        'town_city',
        'county',
        'postcode',
        'path',
        'disney_on_ice',
        'marvel_universe_live',
        'monster_jam'
    ];
}
