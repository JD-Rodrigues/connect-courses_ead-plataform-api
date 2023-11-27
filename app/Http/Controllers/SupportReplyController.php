<?php

namespace App\Http\Controllers;

use App\Models\SupportReply;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupportRequest;
use App\Repositories\SupportReplyRepository;

class SupportReplyController extends Controller
{
    private $repository;

    public function __construct(SupportReplyRepository $repository) {
        $this->repository = $repository;
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupportRequest $request)
    {
        return $this->repository->createNewSupportReply($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(SupportReply $supportReply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupportReply $supportReply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupportReply $supportReply)
    {
        //
    }
}
