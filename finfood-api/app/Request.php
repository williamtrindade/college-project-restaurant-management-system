<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
	protected $table = 'requests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_price',
        'client_id',
        'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function client()
    {
    	return $this->belongsTo('App\Client', 'client_id');
    }

    public function dishes()
    {
        return $this->belongsToMany('App\Dish', 'request_has_dish');
    }
}
