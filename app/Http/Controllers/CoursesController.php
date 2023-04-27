<?php

namespace App\Http\Controllers;

use App\Models\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    
    public function get(Courses $courses)
    {
        try{
            $courses = Courses::all();

            return response()->json($courses, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try{
            $course = Courses::find($id);

            return response()->json($course, 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function create(Request $request)
    {    
        try{   
            $request->validate([
                'name_course' => 'required|max:120',
                'start_date' => 'required',
                'end_date' => 'required',
            ]);

            $course = new Courses();
            $course->name_course = $request->name_course;
            $course->start_date = $request->start_date;
            $course->end_date = $request->end_date;
            $course->save();

            return response()->json($course, 201);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
    
    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'name_course' => 'required|max:120',
                'start_date' => 'required',
                'end_date' => 'required',
            ]);

            $course = Courses::find($id);
    
            $course->name_course = $request->name_course;
            $course->start_date = $request->start_date;
            $course->end_date = $request->end_date;
            $course->update();
    
            return response()->json( $course , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $res = Courses::find($id)->delete();
            return response()->json( ['delete' => $res] , 200);
        } catch (\Throwable $th) {
            return response()->json([ 'error' => $th->getMessage()], 500);
        }
    }
}
