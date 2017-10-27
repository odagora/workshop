<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
     /**
     * The fillable attributes.
     *
     * @var string
     */
    public $fillable = ['name'];
 
    /**
     * Has Many relation
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function types()
    {
        return $this->hasMany('App\Type');
    }
 
}
