@component('mail::message')
#hi {{ $user->name }}

your profile has been updated
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
