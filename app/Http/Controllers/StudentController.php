<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        
        return Student::latest()->get();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $student = new Student();
        $student->StudentFirstName = $request->FName;
        $student->StudentLastName = $request->LName;
        $student->StudentEmail = $request->Email;
        $student->StudentPhoneNumber = $request->PNum;
        $student->HomeState = $request->Home;
        // $student->BirthDate = $request->Date;
        $student->Gender = $request->Gender;
        $student->save();
        return $student;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->StudentFirstName = $request->FName;
        $student->StudentLastName = $request->LName;
        $student->StudentEmail = $request->Email;
        $student->StudentPhoneNumber = $request->PNum;
        $student->HomeState = $request->Home;
        // $student->BirthDate = $request->Date;
        $student->Gender = $request->Gender;
        $student->update();
        return $student;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return 204;
    }
}
