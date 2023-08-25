<?php

namespace App\Http\Controllers\Whastapp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhatsappWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        Storage::disk('local')->put('output.txt', json_encode($request->all()));

        return $this->successResponse((int)$request->get('hub_challenge'), 200);
    }

    public function handleWebhookPost(Request $request)
    {
        Storage::disk('local')->put('output.txt', json_encode($request->all()));

        return $this->successResponse((int)$request->get('hub_challenge'), 200);
    }
}
