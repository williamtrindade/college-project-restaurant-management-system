<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Request as ClientRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        return ClientRequest::where('user_id', '=', 1)->get()
            ->load('dishes', 'client');
    }

    public function store(Request $request)
    {
        $id = 1;
        $clientRequest = new ClientRequest();
        $clientRequest->user_id = $id;
        $clientRequest->client_id = $request['client_id'];
        $clientRequest->total_price = $this->getTotalPrice(collect($request['dishes']));
        $clientRequest->save();
        $clientRequest->dishes()->sync(array_values($request['dishes']));
        return response()->json($clientRequest, 201);
    }

    public function getTotalPrice($dishes)
    {
        $total = 0;
        $dishes->each(function($dishId) use (&$total) {
            $total += Dish::find($dishId)->price;
        });
        return $total;
    }

    public function destroy(ClientRequest $clientRequest)
    {
        $clientRequest->delete();
        return response(null, 204);
    }
}
