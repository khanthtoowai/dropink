@component('mail::message')
# Introduction

Welcome from DropInk guysssss :D

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
