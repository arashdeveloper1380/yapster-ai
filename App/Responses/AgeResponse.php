<?php

namespace App\Responses;

class AgeResponse
{
    public function handle($intent, $data) : ? string{

        if ($intent === 'age' && isset($data)) {
            return "سن شما: " . $data;
        }
        return "نه دیسن!";
    }
}