<x-mail::message :preview="$preview" :subject="$subject">

<x-mail::paragraph>
@lang('qrfeedz-services::reset-user-password.salutation', ['name' => $notifiable->name]),
</x-mail::paragraph>


<x-mail::paragraph>
@lang('qrfeedz-services::reset-user-password.paragraph-1')
</x-mail::paragraph>

<x-mail::paragraph>
@lang('qrfeedz-services::reset-user-password.paragraph-2')
</x-mail::paragraph>

<x-mail::button :url="$resetLink">
@lang('qrfeedz-services::reset-user-password.button')
</x-mail::button>

<x-mail::subcopy>
@if($invalidate)
@lang('qrfeedz-services::reset-user-password.subcopy-mandatory')
@else
@lang('qrfeedz-services::reset-user-password.subcopy-optional')
@endif
</x-mail::subcopy>

<x-mail::vertical-spacer />

</x-mail::message>
