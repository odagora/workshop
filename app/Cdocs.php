<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cdocs extends Model
{
    /**
     * Has Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function cphotos()
    {
        return $this->hasMany('App\Cphotos');
    }
}
