<x-mail::message>
# {{$maildata['title']}}
{{$username}},<br><br>
Your username and password here, Use these credentials to log into the system

<x-mail::panel>
Username : {{$maildata['user']}}<br>
Password : {{$maildata['psw']}}
</x-mail::panel>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
