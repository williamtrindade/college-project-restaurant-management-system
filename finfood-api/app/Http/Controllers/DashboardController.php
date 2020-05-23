<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Client;
use App\Request as ClientRequest;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function stats()
    {
    	try {
    		$dishesQtt  = Dish::where('user_id', '=', Auth::user()->id)->count();
        	$clientsQtt = Client::where('user_id', '=', Auth::user()->id)->count();
            $valoresLiquidados = ClientRequest::where('user_id', '=', Auth::user()->id)->get();
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
