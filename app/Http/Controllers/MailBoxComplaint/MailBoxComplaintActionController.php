<?php

namespace App\Http\Controllers\MailBoxComplaint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MailboxComplaint;
use Illuminate\Http\JsonResponse;

class MailBoxComplaintActionController extends Controller
{
    public function changeComplaintProcess(MailboxComplaint $mailBoxComplaint): JsonResponse
    {
        $mailBoxComplaint->process = 1;
        $mailBoxComplaint->save();

        return response()->json([
            'success' => true,
            'message' => ''
        ]);
    }

    public function markAsSpam(MailboxComplaint $mailBoxComplaint): JsonResponse
    {
        $mailBoxComplaint->process = 2;
        $mailBoxComplaint->save();

        return response()->json([
            'success' => true,
            'message' => ''
        ]);
    }
}
