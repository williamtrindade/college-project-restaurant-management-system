<?php

namespace App;

use App\Request;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $table = 'clients';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 
		'phone',
		'user_id'
	];

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function requests()
	{
		return $this->hasMany('App\Request', 'client_id');
	}
}
