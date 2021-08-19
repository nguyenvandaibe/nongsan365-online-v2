<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Throwable;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request)
    {
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = User::where('email', $request->email)->first();
                $accessToken = $user->createToken('access_token', [$user->role])
                    ->plainTextToken;

                return response()->json([
                    'data' => [
                        'user' => new UserResource($user),
                        'access_token' => $accessToken
                    ],
                    'success' => true
                ]);
            }
        } catch (Throwable $th) {

            Log::error(get_class($this) . ' | login | ' . $th->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'System error.'
            ]);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'success' => true,
            ]);
            
        }catch (Throwable $th){

            Log::error(get_class($this) . ' | logout | ' . $th->getMessage());

            return response()->json([
                'success' => true,
                'error'=>'System error.'
            ]);
        }
    }
}
