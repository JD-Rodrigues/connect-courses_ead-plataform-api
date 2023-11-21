<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Repositories\SupportRepository;
use App\Http\Resources\SupportResource;

class SupportController extends Controller
{
    protected $repository;

    public function __construct(SupportRepository $supportRepository) {
        $this->repository = $supportRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return SupportResource::collection($this->repository->getAllSupports($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        //
    }
}
