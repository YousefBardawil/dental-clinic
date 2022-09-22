@component('mail::message')
# Introduction

Welcome to yousef bardawil

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
