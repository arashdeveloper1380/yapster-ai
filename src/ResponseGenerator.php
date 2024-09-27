<?php

namespace YapsterAi;

class ResponseGenerator {

    public function generateResponse(string $intent, $data): string {
        $responseHandlers = require 'App/intent.php';
        if (array_key_exists($intent, $responseHandlers)) {

            $separator = explode('@', $responseHandlers[$intent]);

            $className = "App\Responses\\" . $separator[0];

            return (new $className)->handle($intent, $data);

        }
        return "متوجه نشدم.";
    }

}