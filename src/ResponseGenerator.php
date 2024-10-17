<?php

namespace YapsterAi;

class ResponseGenerator {

    public function generateResponse(string $intent, $data = null) : string|\Exception {

        $responseHandlers = require 'App/intent.php';

        if (array_key_exists($intent, $responseHandlers)) {

            $separator = explode('@', $responseHandlers[$intent]);

            $className = "App\Responses\\" . $separator[0];
            $methodName = $separator[1];

            return (new $className)->$methodName($intent, $data);
        }
        
        throw new \Exception("$intent not found");
    }

}