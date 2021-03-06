<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model
{
  	use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
