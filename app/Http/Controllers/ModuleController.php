<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ModuleRepository;
use App\Http\Resources\ModuleResource;

class ModuleController extends Controller
{
    protected $repository;
    
    public function __construct(ModuleRepository $moduleRepository) {
        $this->repository = $moduleRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        try {
            return ModuleResource::collection($this->repository->getAllModules($id));
        } catch (\Throwable $th) {
            return $th->getMessage();
        } 
    }

}
