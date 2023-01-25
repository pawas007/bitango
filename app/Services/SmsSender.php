<?php

namespace App\Services;

use Twilio\Rest\Client;

class SmsSender
{
    static function newSms($number, $content): void
    {
//    TODO : Make this action in JOB (queue REDIS)
        try {
            $client = new Client(env('TWILIO_SID'), env('TWILIO_TOCKEN'));
            $client->messages->create(
                $number,
                array(
                    'from' => env('TWILIO_NUMBER'),
                    'body' => $content
                )
            );
        } catch (\Exception) {

        }
    }
}
