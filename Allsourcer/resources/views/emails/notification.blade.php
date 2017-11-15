@component('mail::message')
# Introduction

The body of your message.

@component('mail::panel')
{{ $mailContent['title'] }}
@endcomponent
{{ $mailContent['body'] }}

@component('mail::button', ['url' => $mailContent['url']])
Visite Allsourcer
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
