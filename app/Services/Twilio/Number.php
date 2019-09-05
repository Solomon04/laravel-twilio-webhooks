<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 9/4/2019
 * Time: 10:07 PM
 */

namespace App\Services\Twilio;

use Twilio\Rest\Client;

class Number
{
    /** @var Client */
    public static $client;

    /**
     * @throws \Twilio\Exceptions\ConfigurationException
     */
    public static function setClient()
    {
        self::$client = new Client(config('services.twilio.sid'), config('services.twilio.token'));
    }

    /**
     * Create a phone number with Twilio.
     *
     * @return string
     * @throws \Twilio\Exceptions\ConfigurationException
     * @throws \Twilio\Exceptions\TwilioException
     */
    public static function create()
    {
        self::setClient();
        // List of US Mobile Numbers.
        $numbers = self::$client->availablePhoneNumbers('US')->local->read(
            array("areaCode" => '507')
        );
        $number = self::$client->incomingPhoneNumbers->create([
            "phoneNumber" => $numbers[0]->phoneNumber,
            'SmsUrl' => config('services.twilio.sms_uri'),
            'VoiceUrl' => config('services.twilio.voice_uri')
        ]);
        return $number->phoneNumber;
    }
}