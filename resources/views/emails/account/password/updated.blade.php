@component('mail::message')
# Password updated

Hi {{ $user->name }},

We're just letting you know that your password was updated.
<br><br>
&ndash; The Team at {{ config('app.name') }}
@endcomponent