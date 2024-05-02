@component('mail::message')


Thanks for Registration.

<h4>Email:- {{ $data['email'] }}</h4>
<h4>Password:- {{ $data['password'] }}</h4>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
