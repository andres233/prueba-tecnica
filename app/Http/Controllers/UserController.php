<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\User;



class UserController extends Controller
{

    public function index(){
        return response()->json(User::with(['orders'])->get(), 200);
    }

    
    /**
    * @OA\Post(
    *     path="/api/login",
    *     summary="Login",
    *     tags={"Users"},
    *     @OA\Response(
    *         response=200,
    *         description="Successful operation"
    *     ),
    *     @OA\Response(
    *         response=500,
    *         description="Internal server error"
    *     ),
    *     @OA\Response(
    *         response=406,
    *         description="Not acceptable"
    *     ),
    *     @OA\Parameter(
    *          name="email",
    *          description="address email",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
        *     @OA\Parameter(
    *          name="password",
    *          description="password",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    * )
    */

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];
        
        $status = 401;
        $response = ['error' => 'Unauthorised'];
        
        if (Auth::attempt($credentials)) {
            $status = 200;
            $response = [
                'token' => Auth::user()->createToken('bigStore')->accessToken,
                'user' => Auth::user()
            ];
        }
        
        return response()->json($response, $status);
    }

        /**
    * @OA\Post(
    *     path="/api/register",
    *     summary="Register",
    *     tags={"Users"},
    *     @OA\Response(
    *         response=200,
    *         description="Successful operation"
    *     ),
    *     @OA\Response(
    *         response=500,
    *         description="Internal server error"
    *     ),
    *     @OA\Response(
    *         response=406,
    *         description="Not acceptable"
    *     ),
    *     @OA\Parameter(
    *          name="email",
    *          description="address email",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *     @OA\Parameter(
    *          name="name",
    *          description="name user",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *     @OA\Parameter(
    *          name="password",
    *          description="password",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),
    *     @OA\Parameter(
    *          name="c_password",
    *          description="confirmate password",
    *          required=true,
    *          in="query",
    *          @OA\Schema(
    *              type="string"
    *          )
    *      ),        
    * )
    */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        
        $user = User::create($input);

        $success = [
            'user' => $user,
            'token' => $user->createToken('bigStore')->accessToken,
        ];
        
        return response()->json($success);
    }
    
    public function show(User $user)
    {
        return response()->json($user,200);
    }
    
    public function showOrders(User $user)
    {
        return response()->json($user->orders()->with(['product'])->get(),200);
    }
}