<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;
use Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Dish::where('user_id', '=', Auth::user()->id)
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
        return Dish::create($request->all());
    }

    public function update(Request $request, Dish $dish)
    {
        $id = Auth::user()->id;
        if (!($dish->user_id === $id)) {
            return response('404 Not Found', 404);
        } 
        $request->merge([
                'user_id' => $id
            ]);
        $dish->update($request->all());
        return $dish;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if (!($dish->user_id === Auth::user()->id)) {
            return response('404 Not Found', 404);
        } 
        $dish->delete();
        return response(null, 204);
    }
}
