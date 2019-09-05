<?php

namespace App\Http\Controllers;

use App\Services\Twilio\Number;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Exceptions\ConfigurationException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Assign a phone number to a user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assign()
    {
        /** @var User $user */
        $user = Auth::user();
        if(!is_null($user->twilio_number)) return back()->with('error', 'You already have a Twilio number.');

        try{
            $phone = Number::create();
            $user->update(['twilio_phone' => $phone]);
            return back()->with('success', 'A phone number has been assigned to you.');
        }catch (\Exception $exception){
            return back()->with('error', sprintf('Error: %s', $exception->getMessage()));
        }
    }
}
