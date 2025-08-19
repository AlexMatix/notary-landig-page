<?php

namespace App\Http\Controllers\MailBoxComplaint;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MailboxComplaint;
use Illuminate\Http\JsonResponse;

class MailBoxComplaintActionController extends Controller
{
    public function changeComplaintProcess($id): JsonResponse
    {
        $mailBoxComplaint = MailBoxComplaint::find($id);
        $mailBoxComplaint->process = 1;
        $mailBoxComplaint->save();

        return response()->json([
            'success' => true,
            'message' => ''
        ]);
    }

    public function markAsSpam($id): JsonResponse
    {
        $mailBoxComplaint = MailBoxComplaint::find($id);
        $mailBoxComplaint->process = 2;
        $mailBoxComplaint->save();

        return response()->json([
            'success' => true,
            'message' => ''
        ]);
    }
}
