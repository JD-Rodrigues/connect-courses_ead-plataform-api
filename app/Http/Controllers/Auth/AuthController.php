<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Repositories\AuthRepository;

class AuthController extends Controller
{
    private $repository;

    public function __construct(AuthRepository $repository){
        $this->repository = $repository;
    }

    public function authenticateUser(AuthRequest $request) {
        return $this->repository->authenticate($request->validated());
    }

    public function logoutUser() {
        return $this->repository->logout();
    }

    
}
