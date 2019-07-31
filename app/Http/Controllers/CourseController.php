<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Instructor;
use App\Enrolled;
use App\ClassTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = DB::table('programs')
        ->select('courses.CourseName', 'courses.CourseID', 'courses.InstructorID', DB::raw('SUM(CASE WHEN StudentID <> 0 THEN 1 ELSE 0 END) AS StudentsInClass'), 'instructors.InstructorFirstName', 'instructors.InstructorLastName', 'ProgramName', 'SemesterTaught', 'CourseNumber', 'courses.Description')
        ->join('courses', 'programs.ProgramID', '=', 'courses.Program')
        ->leftJoin(DB::raw('(SELECT CourseID, SemesterTaught FROM class_times GROUP BY CourseID, SemesterTaught) AS classtimes'), 'courses.CourseID', '=', 'classtimes.CourseID')
        ->leftJoin(DB::raw('(SELECT InstructorID, CourseID, StudentID FROM enrolleds) AS enrolled'), 'classtimes.CourseID', '=', 'enrolled.CourseID')
        ->leftJoin('instructors', 'enrolled.InstructorID', '=', 'instructors.InstructorID')
        ->groupBy('courses.CourseName', 'instructors.InstructorFirstName', 'instructors.InstructorLastName', 'SemesterTaught', 'ProgramName', 'CourseNumber', 'courses.Description', 'courses.CourseID', 'courses.InstructorID')->get();

      
        // dd($instructors);
        return $instructors;
    }

    public function enroll(Request $request){
        $check = DB::table('enrolleds')
        ->where([
            ['StudentID', $request->userid],
            ['CourseID', $request->courseid],
            ['InstructorID', $request->instructorid]
        ])->first();
        if(!empty($check)){
            return response()->json("You are already enrolled in this course!", 500);
        }else{
            $enrolled = Enrolled::create([
            'InstructorID' => $request->instructorid,
            'CourseID' => $request->courseid,
            'StudentID' => $request->userid
        ]);
        return $enrolled;
        }
 
    }

    public function checkEnrolled(Request $request){
        $check = DB::table('enrolleds')
        ->where(
            'StudentID', $request->userid
            )->get();
            return $check;
        }
    public function search(Request $request){
        
        Course::where('CourseName', $request->term)->orderBy('CourseName', 'desc');
       
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->prompt == 'Yes'){
            $course = Course::create([
            'InstructorID' => $request->instructor,
            'Program' => $request->program,
            'CourseName' => $request->course,
            'ProgramCode' => $request->code,
            'CourseNumber' => $request->coursenum,
            'Section' => $request->section,
            'Description' => $request->description,
            'CreditHours' => $request->credithours
        ]);
            Enrolled::create([
                'InstructorID' => $request->instructor,
                'CourseID' => DB::table('courses')->latest()->value('CourseID')
            ]);
            if($request->day2 == "None" || $request->day2 == ""){
            ClassTime::create([
                'CourseID' => DB::table('courses')->latest()->value('CourseID'),
                'DayofWeek' =>  $request->day1,
                'StartDate' => $request->start,
                'EndDate' => $request->end,
                'ClassTime' => $request->classtime,
                'SemesterTaught' => $request->semester
            ]);
            }
            else{
                 Enrolled::create([
                'InstructorID' => $request->instructor,
                'CourseID' => DB::table('courses')->latest()->value('CourseID')
            ]);
                ClassTime::create([
                'CourseID' => DB::table('courses')->latest()->value('CourseID'),
                'DayofWeek' =>  $request->day1,
                'StartDate' => $request->start,
                'EndDate' => $request->end,
                'ClassTime' => $request->classtime,
                'SemesterTaught' => $request->semester
            ]);
            ClassTime::create([
                'CourseID' => DB::table('courses')->latest()->value('CourseID'),
                'DayofWeek' =>  $request->day2,
                'StartDate' => $request->start,
                'EndDate' => $request->end,
                'ClassTime' => $request->classtime,
                'SemesterTaught' => $request->semester
            ]);
            }
        }
        
        else{
            $course = Course::create([
            'InstructorID' => $request->instructor,
            'Program' => $request->program,
            'CourseName' => $request->course,
            'ProgramCode' => $request->code,
            'CourseNumber' => $request->coursenum,
            'Section' => $request->section,
            'Description' => $request->description,
            'CreditHours' => $request->credithours
        ]);
        }
        return $course;
    }

    


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course = Course::find($course->CourseID);
        $course->update([
            'InstructorID' => $request->instructor,
            'Program' => $request->program,
            'Course' => $request->course,
            'ProgramCode' => $request->code,
            'CourseNumber' => $request->coursenum,
            'Section' => $request->section,
            'Description' => $request->description,
            'CreditHours' => $request->credithours
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
       $course = Course::find($course->CourseID);
       $course->delete();
    }
}
