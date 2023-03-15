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
     * @OA\Get(
     *     tags={"cars"},
     *     summary="Returns a list of cars",
     *     description="Returns a object of cars",
     *     path="/api/cars",
     *     @OA\Response(response="200", description="A list with cars"),
     * ),
     * 
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
     * @OA\Get(
     *     tags={"cars/{uuid}"},
     *     summary="Returns a car by id",
     *     description="Returns a car by id",
     *     path="/api/cars/{uuid}",
     *     @OA\Response(response="200", description="A single car object"),
     * ),
     * 
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
