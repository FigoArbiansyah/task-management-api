<?php

namespace App\Repositories;
use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface {
    public function register($data) {
        $user = User::create($data);
        return $user;
    }

    public function login($credentials) {
        $token = auth()->attempt($credentials);
        return $token;
    }

    public function me() {
        return auth()->user();
    }

    public function logout() {
        return auth()->logout();
    }

    public function getId() {
        return auth()->user()->id;
    }
}
