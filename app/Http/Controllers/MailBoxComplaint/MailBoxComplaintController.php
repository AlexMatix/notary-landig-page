<?php

namespace App\Http\Controllers\MailBoxComplaint;

use App\Http\Controllers\Controller;
use App\Models\MailBoxComplaint;
use Illuminate\Http\Request;

class MailBoxComplaintController extends Controller
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
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mailbox = MailBoxComplaint::created($request);

        return view('mailbox_complaints')->with('alert', true);
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
     * @param  \App\Models\MailBoxComplaint  $mailBoxComplaint
     * @return \Illuminate\Http\Response
     */
    public function show(MailBoxComplaint $mailBoxComplaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MailBoxComplaint  $mailBoxComplaint
     * @return \Illuminate\Http\Response
     */
    public function edit(MailBoxComplaint $mailBoxComplaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MailBoxComplaint  $mailBoxComplaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MailBoxComplaint $mailBoxComplaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MailBoxComplaint  $mailBoxComplaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(MailBoxComplaint $mailBoxComplaint)
    {
        //
    }
}
