<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Dish;
use App\Models\Request as ClientRequest;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * @throws Exception
     */
    public function stats(): Collection
    {
    	try {
    		$dishesQtt  = Dish::where('user_id', '=', 1)->count();
        	$clientsQtt = Client::where('user_id', '=', 1)->count();
            $valoresLiquidados = ClientRequest::where('user_id', '=', 1)->get();
            //@TODO refatorar collection sum()
            $grossValues = 0;
            $valoresLiquidados->each(function($clientRequest) use (&$grossValues) {
                $grossValues += $clientRequest->total_price;
            });
			return collect([
                'dishesQtt'  => $dishesQtt,
                'clientsQtt' => $clientsQtt,
                'grossCollected' => number_format($grossValues, 2)
            ]);
    	} catch (Exception $e) {
    		throw new Exception("Error Processing Request",  $e);
    	}

    }
}
