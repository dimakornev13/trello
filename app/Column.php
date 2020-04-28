<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dashboard_id',
        'title',
        'sort',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dashboard_id' => 'integer',
    ];
}
