<?php

namespace App\Http\Controllers;

use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\User;
use Session;


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
        $students = student::all();

        return view('student.index', compact('students'));
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
        $student = array(
            'fullname'       => 'required',
            'email'      => 'required|email',
            'dateofbirth' => 'required',
        );
        $validator = Validator::make(Input::all(), $student);
        if ($validator->fails()) {
            return Redirect::to('student/create');
        } else {
            // create new user
            $user = new User;
            $user->name       = Input::get('fullname');
            $user->email       = Input::get('email');
            $user->password = '123456';
            $user->save();
            // store
            $student = new Student;
            $student->fullname       = Input::get('fullname');
            $student->dateofbirth =  Input::get('dateofbirth');
            $student->user_id = $user->id;
            $student->save();

            // redirect
            Session::flash('message', 'Successfully created student!');
            return Redirect::to('student');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(int $student_id)
    {
        $student = student::find($student_id);
        return view('student.detail', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(int $student_id)
    {
        $student = student::find($student_id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $student_id)
    {
        $student = array(
            'fullname'       => 'required',
            'email'      => 'required|email',
            'dateofbirth' => 'required',
        );
        $validator = Validator::make(Input::all(), $student);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('student/' . $id . '/edit');
        } else {            
            $student = student::find($student_id);
            $student->fullname       = Input::get('fullname');
            $student->dateofbirth =  Input::get('dateofbirth');
            $student->save();

            $user = User::find($student->user_id);
            $user->email = Input::get('email');
            $user->save();

            // redirect
            Session::flash('message', 'Successfully update student!');
            return Redirect::to('student');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }
}
