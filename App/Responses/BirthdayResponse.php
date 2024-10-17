<?php

namespace App\Responses;

final class BirthdayResponse {

    public function handle($intent) : ? string{
        $data = "1380/01/22";
        return !empty($data) ? "تاریخ تولد شما: " . $data : "نه دیسن!";
    }
}