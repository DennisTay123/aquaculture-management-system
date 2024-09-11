<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Auth;
use App\Models\RegistrationToken;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
        $this->middleware('guest')->except(['showInitiateRegistrationForm', 'sendRegistrationLink']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'regex:/^[0-9\-\+]/', 'max:15'],
            'address' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/', 'confirmed'],
            'agree_terms_and_conditions' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data, $email)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $email,
            'role' => 'Employee',
            'contact_number' => $data['contact_number'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showInitiateRegistrationForm()
    {
        return view('auth.initiate');
    }

    public function sendRegistrationLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $email = $request->input('email');
        $token = Str::random(60);
        $expired_at = now()->addMinutes(15);

        RegistrationToken::updateOrCreate(
            ['email' => $email],
            ['token' => $token, 'expired_at' => $expired_at]
        );

        // Generate the registration link
        $registrationLink = route('register.complete', ['token' => $token]);

        // Send the email with the registration link
        Mail::to($email)->send(new RegistrationMail($registrationLink));

        return redirect()->back()->with('status', 'Registration link sent!');
    }



    public function showCompleteRegistrationForm($token)
    {
        $registrationToken = RegistrationToken::where('token', $token)->firstOrFail();

        if ($registrationToken->expired_at->isPast()) {
            return redirect()->route('register.expired')->with('error', 'The registration link has expired.');
        }

        return view('auth.complete', compact('token'));
    }

    public function completeRegistration(Request $request, $token)
    {
        $registrationToken = RegistrationToken::where('token', $token)->firstOrFail();

        if ($registrationToken->expired_at->isPast()) {
            return redirect()->route('register.expired')->with('error', 'The registration link has expired.');
        }

        $data = $request->all();
        $data['email'] = $registrationToken->email;

        $this->validator($data)->validate();

        $user = $this->create($data, $registrationToken->email);

        $registrationToken->delete();

        Auth::login($user);

        return redirect($this->redirectPath());
    }




}
