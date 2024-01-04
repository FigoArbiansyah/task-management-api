<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Http\Requests\AuthRequest;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function register(AuthRequest $request) {
        try {
            $validated = $request->validated();
            $this->userRepository->register($validated);
            return ApiResponseHelper::success(201, "Berhasil registrasi!", $validated);

        } catch (\Exception $e) {
            if ($e->getCode() === 422) {
                return $e;
            }
            return ApiResponseHelper::error(500, "Gagal registrasi.", $e->getMessage());
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = $this->userRepository->login($credentials)) {
            return ApiResponseHelper::error(401, 'Gagal Login!', 'Unauthorize');
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        if (auth()->check()) {
            return ApiResponseHelper::success(200, 'Berhasil mendapatkan data pengguna!', $this->userRepository->me());
        }
        return ApiResponseHelper::error(401, 'Gagal mendapatkan data pengguna!', 'Unauthorize');
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->userRepository->logout();

        return ApiResponseHelper::success(200, 'Berhasil Logout', null);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 1880,
        ];
        return ApiResponseHelper::success(200, 'Berhasil Login', $data);
    }
}
