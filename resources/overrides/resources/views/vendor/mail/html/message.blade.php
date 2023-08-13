<x-mail::layout :subject="$subject">

{{-- Header --}}
<x-slot:header>
<x-mail::header>{{ $header ?? 'QRFeedz'}}</x-mail::header>
</x-slot:header>

{{-- Preview --}}
@isset($preview)
<x-slot:preview>{{ $preview }}</x-slot:preview>
@endisset

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>{{ $subcopy }}</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
&copy; {{ date('Y') }} <a href="https://www.qrfeedz.ch" style="color: #007bff; text-decoration: none;">QRFeedz</a>, @lang('qrfeedz-services::common.all-rights-reserved')
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
