<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeClassroomRequest;
use App\Models\Classroom;
use App\Models\Stage;
use App\Models\StageClass;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $classrooms = Classroom::all();
        $stages = Stage::all();
        $stage_classes = StageClass::all();
        $teachers = Teacher::all();
        return view('classrooms.index', ['stages'=>$stages,
                                         'classrooms'=>$classrooms,
                                         'stage_classes'=>$stage_classes,
                                         'teachers'=>$teachers,
                                        ]);
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
    public function store(storeClassroomRequest $request)
    {

        
        try {
                
            $validated = $request->validated();

            Classroom::create([
                'name' => $request->name,
                'stage_id' => $request->stage,
                'stage_class_id' => $request->stage_class,
                'notes' => $request->notes

            ])->teachers()->attach($request->teachers);

   
            flash()->addSuccess('Classroom created successfully');

            return redirect()->route('classrooms.index');

        }
  
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {

        return view('classrooms.classroom_students', compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(storeClassroomRequest $request, Classroom $classroom)
    {

            try{

                $validated = $request->validated();

                    Classroom::where('id', $classroom->id)->update([
                    'name' => $request->name,
                    'stage_id' => $request->stage,
                    'stage_class_id' => $request->stage_class,
                    'notes'   => $request->notes,
                    
                ])->teachers()->sync($request->teachers);
    

                flash()->addSuccess('تم تعديل البيانات بنجاح');
                return redirect()->back();
            }catch(\Exception $ex){
                return redirect()->back()->withErrors(['error'=>$ex->getMessage()]);
            }
        



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        flash()->addSuccess('تم حذف البيانات بنجاح');
        
        return redirect()->back();
    }
}
