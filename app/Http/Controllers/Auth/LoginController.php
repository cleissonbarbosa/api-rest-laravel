<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @OA\Get(
     *     tags={"auth/login"},
     *     summary="Returns user token info if success",
     *     description="Returns token of user if sing in successfully",
     *     path="/api/auth/login",
     *     @OA\Response(response="200", description="A User token"),
     * ),
     * 
    */
    public function login()
    {
        $credentials = request( [ 'email', 'password' ] );

        if ( ! $token = auth()->attempt( $credentials ) ) {
            return response()->json( [ 'error' => 'Unauthorized' ], 401 );
        }

        return $this->respondWithToken( $token );
    }

    /**
     * @OA\Get(
     *     tags={"auth/me"},
     *     summary="Returns user info if is logged",
     *     description="Returns user info if is logged in",
     *     path="/api/auth/me",
     *     @OA\Response(response="200", description="A user info"),
     * ),
     * 
    */
    public function me( Request $request ) {
        return new UserResource( $request->user() );
    }
        
    /**
     * respondWithToken
     *
     * @param  mixed $token
     * @return void
     */
    protected function respondWithToken( $token )
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

        
    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        auth()->logout();
        return response()->json( [ 'message' => 'Successfully logged out' ] );
    }
}
