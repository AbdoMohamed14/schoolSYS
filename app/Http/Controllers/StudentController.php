<?php

namespace App\Http\Controllers;

use App\Http\Requests\storStudentRequest;
use App\Models\Classroom;
use App\Models\Myparent;
use App\Models\StageClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stage_classes = StageClass::all();
        $classrooms = Classroom::all();
        $parents = Myparent::all();
        return view('students.create', compact('stage_classes', 'classrooms', 'parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storStudentRequest $request)
    {

        try{

            $validated = $request->validated();


            $newPhotoName =null ;

            if($request->image){
    
                $newPhotoName = time() . '-' . $request->name_en . '.' . $request->image->extension();
    
                $request->image->move(public_path('student_images'), $newPhotoName);
            }


            Student::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'blood'  => $request->blood,
                'image' => $newPhotoName,
                'address'=> $request->address,
                'stage_class_id' => $request->stage_class,
                'classroom_id' => $request->classroom,
                'parent_id' => $request->parent,
                'religion'  => $request->religion
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.profile', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $stage_classes = StageClass::all();
        $classrooms = Classroom::all();
        $parents = Myparent::all();
        return view('students.edit', compact('student', 'classrooms', 'parents', 'stage_classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(storStudentRequest $request, Student $student)
    {
        
        try{

            $validated = $request->validated();

            $newPhotoName =null ;

            if($request->image){

                if(Storage::exists('public/student_imags/'.$student->image)){
                    Storage::delete('public/student_imags/'.$student->image);
                }
    
                $newPhotoName = time() . '-' . $request->name_en . '.' . $request->image->extension();

                Storage::putFileAs('public/student_imags', $request->image, $newPhotoName);

    
            }


            $student->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'blood'  => $request->blood,
                'image' => $newPhotoName,
                'address'=> $request->address,
                'stage_class_id' => $request->stage_class,
                'classroom_id' => $request->classroom,
                'parent_id' => $request->parent,
                'religion'  => $request->religion
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
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if(Storage::exists('public/student_imags/'.$student->image)){
            Storage::delete('public/student_imags/'.$student->image);
        }
        $student->delete();

        flash()->addSuccess(trans('toaster.success'));
        return redirect()->back();
    }
}
