<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * The fillable attributes.
     *
     * @var string
     */
    public $fillable = ['name', 'make_id'];
 
    /**
     * One to Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function make()
    {
        return $this->belongsTo('App\Make');
    }
}
