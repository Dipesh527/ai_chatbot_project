<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;

class ChatController extends Controller

{
    protected $openAIService;
    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }
    public function index()
    {
        return view('chat.index'); // Points to resources/views/chat/index.blade.php
    }

    public function getMessage(Request $request)
    {
        $userMessage = $request->input('message');

        $botResponse = "You said: " . $userMessage;
        // Get AI response from the service
        // $botResponse = $this->openAIService->getResponse($userMessage);

        return response()->json(['reply' => $botResponse]);
    }
}
