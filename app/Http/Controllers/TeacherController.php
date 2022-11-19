<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeTeacherRequest;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('teachers.index', ['teachers'=>$teachers, 'subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeTeacherRequest $request)
    {
        try{

            $validated = $request->validated();

            Teacher::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'subject_id' => $request->subject,
                'email'  => $request->email,
                'phone' => $request->phone,
                'address'=> $request->address,
            ]);

            flash()->addSuccess(trans('toaster.success'));

            return redirect()->back();

        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['errors'=>$ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.profile',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(storeTeacherRequest $request, Teacher $teacher)
    {

        try{

            $validated = $request->validated();

            $teacher->update($request->all());

            flash()->addSuccess(trans('toaster.success'));

            return redirect()->back();

        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['errors'=>$ex->getMessage()]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        flash()->addSuccess(trans('toaster.success'));
        return redirect()->back();
    }
}
