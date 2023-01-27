<?php

namespace App\Services;

use OpenAI;

class GeneratorOpenAIService
{
    private $client;

    public function __construct(string $key)
    {
        $this->client = OpenAI::client($key);
    }

    public function generateResponseOpenAi(string $question): string
    {
        $response = $this->client->completions()->create([
            'model' => 'text-davinci-003',
            'temperature' => 0.9,
            'top_p' => 1,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
            'prompt' => $question,
            'max_tokens' => 4000,
        ]);

        return $response['choices'][0]['text'];
    }
}