<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:50|unique:lessons,title',
            'description'=>'nullable|string',
            'subject_id'=>'required|integer',
        ]);

        try{
            Lesson::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'subject_id'=>$request->subject_id,

            ]);

            flash()->addSuccess(trans('toaster.success'));
            return redirect()->back();

        }catch(\Exception $ex){
            return redirect()->back()->withErrors([$ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title'=>'required|string|max:50|unique:lessons,title,'.$lesson->id,
            'description'=>'nullable|string',
            
        ]);

        try{
            $lesson->update($request->all());
            flash()->addSuccess(trans('toaster.success'));
            return redirect()->back();

        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        flash()->addSuccess(trans('toaster.success'));
        return redirect()->back();
    }
}
