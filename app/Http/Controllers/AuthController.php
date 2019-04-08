<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterFormRequest;

class AuthController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:api', ['except' => ['login']]);
  }

  public function register(RegisterFormRequest $request)
  {
    $user = new User;
    $user->email = $request->email;
    $user->name = $request->name;
    $user->password = bcrypt($request->password);
    $user->save();
    return response([
      'status' => 'success',
      'data' => $user
    ], 200);
  }

  public function login(Request $request)
  {
    $credentials = $request->only('username', 'password');

    if ($token = $this->guard('api')->attempt($credentials)) {
        return $this->respondWithToken($token);
    }

    return response()->json(['error' => 'Unauthorized'], 401);
  }

  public function me()
  {
    return response()->json($this->guard('api')->user());
  }

  public function logout()
  {
    $this->guard('api')->logout();
    return response()->json(['message' => 'Successfully logged out']);
  }

  public function user(Request $request)
  {
    $user = User::find(Auth::user()->id);
    return response([
        'status' => 'success',
        'data' => $user
      ]);
  }

  
  public function refresh()
  {
    return $this->respondWithToken($this->guard()->refresh());
  }

  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'user' => $this-guard()->user(),
      'token_type' => 'bearer',
      'expires_in' => $this->guard('api')->factory()->getTTL() * 60
    ]);
  }

  public function guard()
  {
    return \Auth::guard('api');
  }
}
