<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactActionController extends Controller
{
    public function changeContactProcess(Contact $contact): JsonResponse
    {

        $contact->process = 1;
        $contact->save();

        return response()->json([
            'success' => true,
            'message' => ''
        ]);
    }
}
