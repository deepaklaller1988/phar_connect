@component('mail::message')
# Hello, You have got an enquiry !

<h3>Name: {{ $data['full_name']}}</h3>
<h3>Email: {{ $data['email']}}</h3>
<h3>Phone: {{ $data['phone']}}</h3>
<h3>Message: {{ $data['messages']}}</h3>


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
