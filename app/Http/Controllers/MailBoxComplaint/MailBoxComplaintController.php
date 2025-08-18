<?php

namespace App\Http\Controllers\MailBoxComplaint;

use Illuminate\Http\Request;
use App\Models\MailboxComplaint;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class MailBoxComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        // $response = MailBoxComplaint::where('process', 0)->orderBy("id", "desc")->paginate(100);
        $response = MailboxComplaint::where('process', 0)->orderBy("id", "desc")->paginate(100);
        return $this->showList($response);
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $mailbox = MailboxComplaint::create($request->all());

        return view('mailbox_complaints')->with('alert', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MailboxComplaint  $mailBoxComplaint
     * @return \Illuminate\Http\Response
     */
    public function show(MailboxComplaint $mailBoxComplaint)
    {
        return $this->showOne($mailBoxComplaint);
    }



}
