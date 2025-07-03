<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    public function index()
    {
        return Dish::where('user_id', '=', 1)
            ->get();
    }

    public function store(Request $request)
    {
        $id = 1;
        $request->merge([
                'user_id' => $id
            ]);
        return response()->json(Dish::create($request->all()), 201);
    }

    public function update(Request $request, Dish $dish)
    {
        $id = 1;
        if (!($dish->user_id === $id)) {
            return response('404 Not Found', 404);
        }
        $request->merge([
                'user_id' => $id
            ]);
        $dish->update($request->all());
        return $dish;
    }

    public function destroy(Dish $dish)
    {
        if (!($dish->user_id === 1)) {
            return response('404 Not Found', 404);
        }
        $dish->delete();
        return response(null, 204);
    }
}
