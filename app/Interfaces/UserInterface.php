<?php

namespace App\Interfaces;

interface UserInterface {
    public function register(Array $data);
    public function login($credentials);
    public function me();
    public function logout();
    public function getId();
}
