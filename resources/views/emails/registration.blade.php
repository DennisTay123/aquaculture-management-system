@component('mail::message')

# Welcome to Aquaculture Management System!

We are excited to have you on board. Click the button below to complete your registration and access your account.

@component('mail::button', ['url' => $registrationLink])
Complete Registration
@endcomponent

If you did not request this email, no further action is required.

Regards,<br>
{{ config('app.name') }}

@endcomponent