<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $table = 'dishes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'user_id'
    ];

    public function user()
    {
    	return $this->belogsTo('App\Models\User', 'user_id');
    }

    public function requests()
    {
    	return $this->belogsToMany('App\Models\Request', 'request_has_dish');
    }
}
