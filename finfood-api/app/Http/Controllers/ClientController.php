<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
	public function index()
    {
		return Client::where('user_id', '=', 1)->get();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return JsonResponse
     */
	public function store(Request $request): JsonResponse
    {
        $id = 1;
		// @todo $id = Auth::user()->id;
		$request->merge([
				'user_id' => $id
			]);
        return response()->json(Client::create($request->all()), 201);

	}

	public function show(Client $client)
    {
        $id = 1;

        if (!($client->user_id === $id)) {
            return response('404 Not Found', 404);
        }
        return $client;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Client $client
     * @return Client|ResponseFactory|Application|Response|object
     */
	public function update(Request $request, Client $client)
    {
        $id = 1;
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
     * @param Client $client
     * @return Response
     */
	public function destroy(Client $client): Response
    {
        if (!($client->user_id === 1)) {
            return response('404 Not Found', 404);
        }
        $client->delete();
		return response(null, 204);
	}
}
