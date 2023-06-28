<x-mail::message>
# Hello

This is a sample markdown email.

<x-mail::button :url="$url">
{{ $buttonText }}
</x-mail::button>

<x-mail::panel>
This is a panel component. It's used to highlight some important content.
</x-mail::panel>

<x-mail::table>
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
@foreach ($tableData as $data)
| {{ $data[0] }} | {{ $data[1] }} |
@endforeach
</x-mail::table>

<x-mail::subcopy>
This is some subcopy text. It's typically used for providing additional information or clarification.
</x-mail::subcopy>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
