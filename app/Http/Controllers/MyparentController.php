<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeParentRequest;
use App\Models\Myparent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class MyparentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parents = Myparent::all();

        return view('parents.index',[
            'parents'=>$parents
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
    public function store(storeParentRequest $request)
    {
        try{

            $validated = $request->validated();

            Myparent::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'email'  => $request->email,
                'password' => Hash::make(Str::random(8)),
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
     * @param  \App\Models\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function show(Myparent $parent)
    {
        return view('parents.profile', compact('parent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function edit(Myparent $myparent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function update(storeParentRequest $request, Myparent $parent)
    {

        try{

            $validated = $request->validated();

            $parent->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Myparent  $myparent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Myparent $parent)
    {

        try{

            $parent->delete();

            return redirect()->back();

        }catch(\Exception $ex){

            flash()->addError('Something went wrong please try again later');
            return redirect()->back()->withErrors(['error'=>$ex->getMessage()]);
        }
    }




}
