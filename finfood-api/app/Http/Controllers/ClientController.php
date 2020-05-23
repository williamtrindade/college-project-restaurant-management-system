<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
    {
		return Client::where('user_id', '=', Auth::user()->id)
			->get();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) 
    {
		$id = Auth::user()->id;
		$request->merge([
				'user_id' => $id
			]);
		return Client::create($request->all());
	}

	public function show(Client $client)
    {
        $id = Auth::user()->id;
        if (!($client->user_id === $id)) {
            return response('404 Not Found', 404);
        }
        return $client;
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Client $client)
    {
        $id = Auth::user()->id;
        if (!($client->user_id === $id)) {
            return response('404 Not Found', 404);
        } 
		$request->merge([
				'user_id' => $id
			]);
		$client->update($request->all());
		return $client;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Client $client)
    {
        if (!($client->user_id === Auth::user()->id)) {
            return response('404 Not Found', 404);
        } 
        $client->delete();
		return response(null, 204);
	}
}
