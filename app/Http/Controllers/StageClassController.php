<?php

namespace App\Http\Controllers;

use App\Http\Requests\stageClassStoreRequest;
use App\Http\Requests\stageClassUpdateRequest;
use App\Models\Stage;
use App\Models\StageClass;
use Illuminate\Http\Request;

class StageClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stage_classes = StageClass::all();
        $stages = Stage::all();
        return view('stage_classes.index', compact('stage_classes', 'stages'));
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
    public function store(stageClassStoreRequest $request)
    {
        try {
                
            $validated = $request->validated();

            StageClass::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'stage_id' => $request->stage,
            ]);

            flash()->addSuccess('Stage Class created successfully');

            return redirect()->route('stage_classes.index');

        }
  
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StageClass  $stageClass
     * @return \Illuminate\Http\Response
     */
    public function show(StageClass $stageClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StageClass  $stageClass
     * @return \Illuminate\Http\Response
     */
    public function edit(StageClass $stageClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StageClass  $stageClass
     * @return \Illuminate\Http\Response
     */
    public function update(stageClassUpdateRequest $request)
    {
        try {
                
            $validated = $request->validated();

            StageClass::where('id', $request->id)->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'stage_id' => $request->stage,
            ]);

            flash()->addSuccess('Stage Class Updated successfully');

            return redirect()->route('stage_classes.index');

        }
  
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StageClass  $stageClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $stage_class = StageClass::findOrFail($request->id)->delete();

        flash()->addSuccess('Stage Class deleted successfully');
        return redirect()->route('stage_classes.index');
    }
}

