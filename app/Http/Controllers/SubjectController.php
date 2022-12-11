<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeSupjectRequest;
use App\Models\StageClass;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stage_classes = StageClass::all();
        $subjects = Subject::all();
        return view('subjects.index', ['subjects'=>$subjects, 'stage_classes'=>$stage_classes]);
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
    public function store(storeSupjectRequest $request)
    {
        try{
        $validated = $request->validated();

        $newPhotoName =null ;

        if($request->image){

            $newPhotoName = time() . '-' . $request->name_en . '.' . $request->image->extension();

            Storage::putFileAs('public/subject_imags', $request->image, $newPhotoName);
        }

        Subject::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'image'  =>$newPhotoName,
        ]);

        flash()->addSuccess(trans('toaster.success'));
        return redirect()->back();

        }catch(\Exception $ex){
            return redirect()->back()->withErrors(['errors' => $ex->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        $lessons = $subject->lessons;
        return view('subjects.show', ['lessons'=>$lessons, 'subject'=>$subject]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(storeSupjectRequest $request, Subject $subject)
    {
            try{
                if($request->image){
                    
                    if(Storage::exists('public/subject_imags/'.$subject->image)){
                        Storage::delete('public/subject_imags/'.$subject->image);
                    }
                    $newPhotoName = time() . '-' . $request->name_en . '.' . $request->image->extension();

                    Storage::putFileAs('public/subject_imags', $request->image, $newPhotoName);

                    $subject->image = $newPhotoName;
                }

                $validated = $request->validated();

                $subject->update([
                    'name_ar' =>$request->name_ar,
                    'name_en' =>$request->name_en,
                    'image'   =>$subject->image,
                    'stage_class' => $request->stage_class,
                ]);

                flash()->addSuccess(trans('toaster.success'));

                return redirect()->back();

            }catch(\Exception $ex){

                return redirect()->back()->withErrors(['errors'=>$ex->getMessage()]);
            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {

        if(Storage::exists('public/subject_imags/'.$subject->image)){
            Storage::delete('public/subject_imags/'.$subject->image);
        }

        $subject->delete($subject->id);

        flash()->addSuccess('toaster.success');
        return redirect()->back();

    }
}
