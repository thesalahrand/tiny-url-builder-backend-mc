<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LoginUserRequest;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use HttpResponses;

    public function register(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        return $this->success([
            'user' => new UserResource($user),
            'token' => $user->createToken("API Token of {$user->first_name} {$user->last_name}")->plainTextToken
        ]);
    }

    public function login(LoginUserRequest $request)
    {
        $validated = $request->validated();

        if (!auth()->attempt($validated)) {
            return $this->error(null, 401, 'Credentials do not match');
        }

        $user = User::where('email', $validated['email'])->first();

        return $this->success([
            'user' => new UserResource($user),
            'token' => $user->createToken("API Token of {$user->first_name} {$user->last_name}")->plainTextToken
        ]);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return $this->success(null, 200, 'You have successfully been logged out');
    }
}
