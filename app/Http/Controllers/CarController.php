<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;

class CarController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * list all items
     *
     * @return string
     */
    public function listAll() {
        if( ! $response = Car::all() ) {
            return response()->json([
                'status' => 404,
                'message' => 'no items found'
            ], 404);
        }

        return response()->json($response);
    }

    /**
     * get item by id
     *
     * @param  string $id
     * @return string
     */
    public function get( string $id ) {
        if( ! $response = Car::find( $id ) ) {
            return response()->json([
                'status' => 404,
                'message' => 'item not found'
            ], 404);
        }

        return response()->json( $response );
    }

}
