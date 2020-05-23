<?php

namespace App\Http\Controllers;

use App\Request as ClientRequest;
use App\Dish;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class RequestController extends Controller
{
    public function index()
    {
        return ClientRequest::where('user_id', '=', Auth::user()->id)->get()
            ->load('dishes', 'client');
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $clientRequest = new ClientRequest();
        $clientRequest->user_id = $id;
        $clientRequest->client_id = $request['client_id'];
        $clientRequest->total_price = $this->getTotalPrice(collect($request['dishes']));
        $clientRequest->save();
        $clientRequest->dishes()->sync(array_values($request['dishes']));
        return $clientRequest;
    }

    public function getTotalPrice($dishes)
    {
        $total = 0;
        $dishes->each(function($dishId) use (&$total) {
            $total += Dish::find($dishId)->price;
        });
        return $total;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientRequest $clientRequest)
    {
        $clientRequest->delete();
        return response(null, 204);
    }
}
