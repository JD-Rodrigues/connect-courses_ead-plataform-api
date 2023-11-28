<?php

namespace App\Http\Controllers;

use App\Models\SupportReply;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSupportRequest;
use App\Http\Requests\StoreSupportReplyRequest;
use App\Repositories\SupportReplyRepository;

class SupportReplyController extends Controller
{
    private $repository;

    public function __construct(SupportReplyRepository $supportReplyRepository) {
        $this->repository = $supportReplyRepository;
    }

    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupportReplyRequest $request)
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
