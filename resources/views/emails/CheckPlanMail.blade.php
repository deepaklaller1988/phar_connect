@component('mail::message')
# Hello, You have got an enquiry !

plan expire


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
