<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('OPENAI_API_KEY'); // Get API key from .env
    }

    public function getResponse($userMessage)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4', // GPT-4 model
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                ['role' => 'user', 'content' => $userMessage],
            ]
        ]);

        if ($response->successful()) {
            return $response->json('choices')[0]['message']['content'] ?? 'Sorry, I could not process your request.';
        }

        return 'Error: ' . $response->status();
    }
}
