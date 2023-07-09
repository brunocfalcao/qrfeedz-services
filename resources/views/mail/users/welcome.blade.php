<x-mail::message :preview="$preview">

<x-mail::button>
Reset your password
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
