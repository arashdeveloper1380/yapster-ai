<?php

namespace App\Responses;

class BirthdayResponse
{
    public function handle($intent, $data) : ? string{

        if ($intent === 'birthday' && isset($data)) {
            return "تاریخ تولد شما: " . $data;
        }
        return "نه دیسن!";
    }
}