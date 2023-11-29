<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use App\Repositories\AuthRepository;
use App\Http\Resources\AuthResource;

class AuthController extends Controller
{
    private $repository;

    public function __construct(AuthRepository $repository){
        $this->repository = $repository;
    }

    public function getAuthenticatedUser() {
        $user = $this->repository->getAuthUser();
        return AuthResource::make($user);
    }

    public function authenticateUser(AuthRequest $request) {
        return $this->repository->authenticate($request->validated());
    }

    public function logoutUser() {
        return $this->repository->logout();
    }    
}
