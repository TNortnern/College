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

    public function createstudent(Request $request)
    {
        
        $student = new Student();
        $student->StudentFirstName = $request->FName;
        $student->StudentLastName = $request->LName;
        $student->StudentEmail = $request->Email;
        $student->StudentPhoneNumber = $request->PNum;
        $student->HomeState = $request->Home;
        $student->BirthDate = $request->Date;
        $student->Gender = $request->Gender;
        $student->save();
        return $student;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
