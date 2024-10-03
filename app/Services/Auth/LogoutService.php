<?php

namespace App\Services\Auth;

use Illuminate\Http\JsonResponse;

readonly class LogoutService
{
    public function run(): JsonResponse
    {
        auth()->user()->token()->revoke();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
