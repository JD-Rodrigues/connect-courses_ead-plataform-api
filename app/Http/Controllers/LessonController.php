<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Repositories\LessonRepository;
use App\Http\Resources\LessonResource;


class LessonController extends Controller
{
    protected $repository;
    
    public function __construct(LessonRepository $lessonRepository) {
        $this->repository = $lessonRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($moduleId)
    {
        return LessonResource::collection($this->repository::getAllLessons($moduleId));
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
    public function show($lessonId)
    {
        return new LessonResource($this->repository::getLesson($lessonId));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
