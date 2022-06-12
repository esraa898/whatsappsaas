@component('mail::message')
# Introduction

{{$name}}

you have subscribed to {{ $package }} package

Thanks,<br>
{{ config('app.name') }}
@endcomponent
