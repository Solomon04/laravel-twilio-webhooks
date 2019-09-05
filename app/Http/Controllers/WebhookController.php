<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Twilio\TwiML\VoiceResponse;

class WebhookController extends Controller
{

    /**
     * Call using Twilio webhooks.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function call(Request $request)
    {
        $response = new VoiceResponse();
        /** @var User $user */

        // Find a user by searching for its Twilio number.
        $user = User::where('twilio_phone', '=', $request->to)->first();

        // Call the user's actual phone number using their twilio number as the caller ID.
        $response->dial($user->phone, ['callerId' => $request->to]);

        // Robotic Voice Says Goodbye After Call Is Ended.
        $response->say('Goodbye.');

        // Return XML to the Twilio API
        return response($response->asXML())->header('Content-Type', 'text/xml');
    }

    /**
     * Text message using Twilio webhooks.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function text(Request $request)
    {
        $response = new VoiceResponse();
        /** @var User $sender */
        $sender = User::where('phone', '=', $request->From)->first();
        /** @var User $recipient */
        $recipient = User::where('twilio_phone', '=', $request->To)->first();
        $response->sms($request->Body, [
            'from' => $sender->twilio_phone,
            'to' => $recipient->phone
        ]);
        return response($response->asXML())->header('Content-Type', 'text/xml');
    }
}
