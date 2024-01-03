<?php

namespace App\Repositories;
use App\Interfaces\UserInterface;

class UserRepository implements UserInterface {
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
