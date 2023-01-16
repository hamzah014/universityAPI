<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::select('name','address')->get();

        return response([ 'student' => StudentResource::collection($students), 
                          'message' => 'Success'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required|max:255',
            'course' => 'required|max:255',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 
            'Validation Error']);
        }

        $student = Student::create($data);

        return response([ 'student' => new StudentResource($student), 
                          'message' => 'Success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        return response([ 'student' => new StudentResource($student), 
                          'message' => 'Success'], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        
        $student->update($request->all());

        return response([ 'student' => new StudentResource($student), 
                          'message' => 'Success'], 200);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();

        return response(['message' => 'Success'], 200);
    }

    public function getStudent(Request $request){

        $data = $request->all();

        $validator = Validator::make($data, [
            'search' => 'required',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 
            'Validation Error']);
        }

        $searchval = $data['search'];

        $student = Student::where('name','LIKE',"%$searchval%")->orWhere('email','LIKE',"%$searchval%")->get();
        //$student = Student::whereLike(['name', 'email'],$searchval)->get();

        return response([ 'student' => StudentResource::collection($student), 
                          'message' => 'Success'], 200);

    }

}
