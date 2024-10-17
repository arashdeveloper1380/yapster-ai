<?php

namespace App\Responses;

final class AgeResponse {

    public function handle($intent) : ? string{
        $data = 23;
        return !empty($data) ? " سن شما:  $data" : 'نه دیسن !';
    }

}