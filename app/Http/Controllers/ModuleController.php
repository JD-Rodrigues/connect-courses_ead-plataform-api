<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ModuleRepository;
use App\Http\Resources\ModuleResource;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'id'=>'required|string|size:36'
        ];

        $validationFailMessages = [
            'id.required' => 'No course id was passed.',
            'id.string' => 'The course id must be a string.',
            'id.size' => 'The course id must be a uuid containing exactly 36 chars.'
        ];
        
        try {
            Validator::make(['id' => $id], $rules, $validationFailMessages);
            return ModuleResource::collection($this->repository->getAllModules($id));
        } catch (\Throwable $th) {
            return $th->getMessage();
        } 
    }

}
