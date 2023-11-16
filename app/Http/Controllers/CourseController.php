<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Resources\CourseResource;
use App\Repositories\CourseRepository;

class CourseController extends Controller
{
    protected $repository;
    
    public function __construct(CourseRepository $courseRepository) {
        $this->repository = $courseRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CourseResource::collection($this->repository->getAllCourses());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        try {
            return new CourseResource($this->repository->getCourse($id));
        } catch (\Throwable $th) {
            return $th->getMessage();
        } 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
