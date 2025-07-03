<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property mixed $client_id
 * @property int|mixed $total_price
 * @property mixed $user_id
 */
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

    public function user(): BelongsTo
    {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function client(): BelongsTo
    {
    	return $this->belongsTo('App\Models\Client', 'client_id');
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Dish', 'request_has_dish');
    }
}
