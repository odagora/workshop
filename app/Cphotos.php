<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cphotos extends Model
{
    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cdocs()
    {
        return $this->belongsTo('App\Cdocs');
    }
}
