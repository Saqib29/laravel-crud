<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha',
            'email' => 'required|email'
        ]);
         Student::create([
             'name' => $request->name,
             'email' => $request->email
         ]);

        // Session::flash();
        $request->session()->flash('success', 'Student created successfully');
         
         return redirect()->back();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student, $id)
    {
        $student = Student::find($id);
        return view('student.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $student = Student::find($id);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();

        $request->session()->flash('success', 'Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student, $id, Request $request)
    {
        $student = Student::find($id);
        $student->delete();

        $request->session()->flash('success', "Deleted Succesfully!");
        return redirect()->back();
    }
}
