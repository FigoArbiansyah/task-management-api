<?php

namespace App\Interfaces;

interface UserInterface {
    public function login($credentials);
    public function me();
    public function logout();
}
