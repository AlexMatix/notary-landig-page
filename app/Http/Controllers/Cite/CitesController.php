<?php

namespace App\Http\Controllers\Cite;

use App\Http\Controllers\Controller;
use App\Models\Cite;
use Illuminate\Http\Request;

class CitesController extends Controller
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
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $contact = Cite::create($request->all());

        return view('index')->with('alert', true);
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
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function show(Cite $cite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function edit(Cite $cite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cite $cite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cite  $cite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cite $cite)
    {
        //
    }
}
