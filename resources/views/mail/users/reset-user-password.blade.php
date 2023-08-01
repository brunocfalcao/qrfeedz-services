<x-mail::message :preview="$preview" :subject="$subject">

<x-mail::paragraph>
@lang('qrfeedz-services::reset-user-password.email-reset-password-requested.salutation', ['name' => $notifiable->name]),
</x-mail::paragraph>


<x-mail::paragraph>
@lang('qrfeedz-services::reset-user-password.email-reset-password-requested.paragraph-1')
</x-mail::paragraph>

<x-mail::paragraph>
@lang('qrfeedz-services::reset-user-password.email-reset-password-requested.paragraph-2')
</x-mail::paragraph>

<x-mail::button :url="$resetLink">
@lang('qrfeedz-services::reset-user-password.email-reset-password-requested.button')
</x-mail::button>

<x-mail::subcopy>
@if($invalidate)
@lang('qrfeedz-services::reset-user-password.email-reset-password-requested.subcopy-mandatory')
@else
@lang('qrfeedz-services::reset-user-password.email-reset-password-requested.subcopy-optional')
@endif
</x-mail::subcopy>

<x-mail::vertical-spacer />

</x-mail::message>
