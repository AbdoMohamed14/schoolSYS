<?php

namespace App\Http\Controllers;

use App\Models\SessionTable;
use Illuminate\Http\Request;

class SessionTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sessionTables.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SessionTable  $sessionTable
     * @return \Illuminate\Http\Response
     */
    public function show(SessionTable $sessionTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SessionTable  $sessionTable
     * @return \Illuminate\Http\Response
     */
    public function edit(SessionTable $sessionTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SessionTable  $sessionTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SessionTable $sessionTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SessionTable  $sessionTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(SessionTable $sessionTable)
    {
        //
    }
}
