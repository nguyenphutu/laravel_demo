<?php

namespace App\Http\Controllers;

use App\teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\User;
use Session;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = teacher::all();

        return view('teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher = array(
            'fullname'       => 'required',
            'email'      => 'required|email',
            'dateofbirth' => 'required',
            'position' => 'required',
        );
        $validator = Validator::make(Input::all(), $teacher);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('teacher/create');
        } else {
            // create new user
            $user = new User;
            $user->name       = Input::get('fullname');
            $user->email       = Input::get('email');
            $user->password = '123456';
            $user->save();
            // store
            $teacher = new Teacher;
            $teacher->fullname       = Input::get('fullname');
            $teacher->dateofbirth =  Input::get('dateofbirth');
            $teacher->position =  Input::get('position');
            $teacher->user_id = $user->id;
            $teacher->save();

            // redirect
            Session::flash('message', 'Successfully created teacher!');
            return Redirect::to('teacher');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($teacher_id)
    {
        //
        $teacher = teacher::find($teacher_id);
        return view('teacher.detail', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(int $teacher_id)
    {
        $teacher = teacher::find($teacher_id);
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $teacher_id)
    {
        $teacher = array(
            'fullname'       => 'required',
            'email'      => 'required|email',
            'dateofbirth' => 'required',
            'position' => 'required',
        );
        $validator = Validator::make(Input::all(), $teacher);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('teacher/' . $id . '/edit');
        } else {            
            $teacher = teacher::find($teacher_id);
            $teacher->fullname       = Input::get('fullname');
            $teacher->dateofbirth =  Input::get('dateofbirth');
            $teacher->position =  Input::get('position');
            $teacher->save();

            $user = User::find($teacher->user_id);
            $user->email = Input::get('email');
            $user->save();

            // redirect
            Session::flash('message', 'Successfully update teacher!');
            return Redirect::to('teacher');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $teacher_id)
    {
        // delete user and teacher
        $teacher = teacher::find($teacher_id);
        $user = User::find($teacher->user_id);
        $user->delete();
        $teacher->delete();


        Session::flash('message', 'Successfully deleted the teacher!');
        return Redirect::to('teacher');
    }
}
