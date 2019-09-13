@component('mail::message')
## Welcome To Our Cloned Version Of Instagram INSTACLONE

You're getting this email because you successfully signed up.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
