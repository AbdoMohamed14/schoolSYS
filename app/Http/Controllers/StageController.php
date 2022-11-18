<?php

namespace App\Http\Controllers;

use App\Http\Requests\stageStoreRequest;
use App\Models\Stage;
use Illuminate\Http\Request;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages = Stage::all();
        return view('stages.index', compact('stages'));
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
    public function store(stageStoreRequest $request)
    {

            try {
                
                $validated = $request->validated();

                Stage::create([
                    'name_ar' => $request->name_ar,
                    'name_en' => $request->name_en,
                    'notes'    => $request->notes,
                ]);
    
                flash()->addSuccess('Stage created successfully');
    
                return redirect()->route('stages.index');

            }
      
            catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

        

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function edit(Stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(stageStoreRequest $request)
    {
        try {
                
            $validated = $request->validated();

            Stage::where('id', $request->id)->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'notes'    => $request->notes,
            ]);

            flash()->addSuccess('Stage updated successfully');

            return redirect()->route('stages.index');

        }
  
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $stage = Stage::findOrFail($request->id)->delete();
        flash()->addSuccess('Stage deleted successfully');
        return redirect()->route('stages.index');
    }
}
