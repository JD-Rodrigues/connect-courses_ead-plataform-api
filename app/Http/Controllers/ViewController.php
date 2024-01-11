<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateViewRequest;
use App\Repositories\ViewRepository;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $repository;
    
     public function __construct(ViewRepository $repository) {
        $this->repository = $repository;
    }
    
     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CreateViewRequest $request)
    {
        return $this->repository->createNewView($request->validated());
    }
}
