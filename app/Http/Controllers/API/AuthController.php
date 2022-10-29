<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\API\V1\UserResource;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Authenticate user
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device' => 'optional|string'
        ]);

        $isLogged = auth()->attempt($validated, $request->get('remember', false));
        if (!$isLogged) {
            return response()->json([
                'message' => 'Las credenciales son inválidas'
            ], 401);
        }

        $user = auth()->user();
        $accessToken = $this->createAccessToken($user);

        return response()->json([
            'message' => 'Inicio de sesión existoso',
            'user' => new UserResource($user),
            'access_token' => $accessToken
        ], 200);
    }

     /**
     *  Register user
    */
    public function register(RegisterRequest $request)
    {
        $validated = $request->safe()->merge([
            'password' => Hash::make($request->validated('password'))
        ])->all();

        $newUser = User::create($validated);
        $accessToken = $this->createAccessToken($newUser);

        return response()->json([
            'message' => 'Usuario creado exitosamente',
            'user' => new UserResource($newUser),
            'access_token' => $accessToken
        ], 201);
    }

    public function logout(Request $request) {
        /** @var \App\Models\User */
        $tokenRevoked = $request->user('api')->token()->revoke();
        if(!$tokenRevoked){
            return response()->json([
                'message' => 'No se ha podido cerrar la sesión'
            ], 500);
        }

        return response()->json([
            'message' => 'Sesión cerrada existosamente'
        ], 200);
    }

    public function createAccessToken(User $user) {
        //Device name based on user agent header
        $device = request()->server('HTTP_USER_AGENT', 'device');
        $accessToken = $user->createToken("accessToken | {$device}")->accessToken;

        return $accessToken;
    }
}
