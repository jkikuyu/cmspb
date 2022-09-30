<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
//use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;

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
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function login(UserRequest $request)
    {

        try {
            if ($request->userid) {
                $request->validate([
                    'userid' => 'required|string',
                    'password' => 'required|string',
                ]);
                $credentials = $request->only('userid', 'password');
            } else {
                error_log("email");
                error_log($request->email);
                $request->validate([
                    'email' => 'required|string|email',
                    'password' => 'required|string',
                ]);
                $credentials = $request->only('email', 'password');
                error_log(implode($credentials));
            }
            $token = Auth::attempt($credentials);

            if (!$token) {
                return response()->json([
                    'status' => '401',
                    'message' => 'Unauthorized',
                ], 401);
            }

            $user = Auth::user();
            $csrf = csrf_token();
            error_log($csrf);
            return response()->json([
                'status' => '200',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'x_csrf_token' => $csrf,
                    'type' => 'bearer',
                ]
            ]);
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            return response()->json([
                'status' => '404',
                'message' => 'Not found',
            ]);
        }
    }

    public function register(UserRequest $request)
    {
        $validated = "";
        error_log($request->userid);
        error_log($request->password);
        try {

            if ($request->userid) {
                $validated = $request->validate(
                    [
                        'userid' => 'required|string|max:10|unique:users',
                        'password' => 'required|string|min:8',
                    ]
                );
            } else {
                $validated = $request->validate([
                    'firstname' => 'required|string|max:255',
                    'middlename' => 'string|max:255',
                    'lastname' => 'required|string|max:255',
                    'email' => 'required|string|max:255|unique:users',
                    'password' => 'required|string|min:8',
                ]);
            }

            $validated['password'] = Hash::make($validated['password']);
            $user = User::create($validated);
            $token = Auth::login($user);
            return response()->json([
                'status' => '200',
                'message' => 'User created successfully',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        } catch (Exception $ex) {
            error_log($ex->getMessage());

            return response()->json([
                'status' => '409',
                'message' => 'conflict with existing resource',
            ]);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();


            return response()->json([
                'status' => '200',
                'message' => 'Successfully logged out',
            ]);
        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
    }

    public function refresh()
    {
        error_log("refresh....");
        $user = Auth::user();
        error_log($user->id);
        return response()->json([
            'status' => '200',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
