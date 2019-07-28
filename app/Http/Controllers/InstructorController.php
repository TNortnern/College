<?php

namespace App\Http\Controllers;

use App\User;
use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return Instructor::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $admin = $request->admin;
        $instructor = Instructor::create([
            'InstructorFirstName' => $firstname,
            'InstructorLastName' => $lastname,
            'InstructorEmail' => $email,
            'InstructorPhone' => $request->pnum,
            'DegreeEarned' => $request->earned,
            'DegreeSchool' => $request->school,
            'Description' => $request->description,
            'Admin' => $admin
        ]);

        User::create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => Hash::make(12345678),
            'student' => 0,
            'instructor' => 1,
            'administrator' => $admin
        ]);
        
        return $instructor;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instructor $instructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {
        //
    }
}
