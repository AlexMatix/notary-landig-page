<?php

namespace App\Http\Controllers\Whastapp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhatsappWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        return $this->successResponse('-->', 200);
    }
}
