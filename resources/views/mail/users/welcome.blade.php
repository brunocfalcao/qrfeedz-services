<x-mail::message :preview="$preview" :subject="$subject" :header="$header">

<x-mail::paragraph>
#### {{ ucfirst(__('qrfeedz::defaults.hi-there')) }} {{ $notifiable->name }}!

{{ __('qrfeedz::users.onboard.intro-text') }}

</x-mail::paragraph>

<x-mail::button :url="$url">
{{ __('qrfeedz::defaults.reset-your-password') }}
</x-mail::button>

<x-mail::paragraph>
{{ __('qrfeedz::users.onboard.sub-text') }}
</x-mail::paragraph>

</x-mail::message>
