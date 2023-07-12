<x-mail::message :preview="$preview">

<x-mail::paragraph>
#### {{ ucfirst(__('qrfeedz::defaults.hi-there')) }} {{ $notifiable->name }}!
Welcome to QRFeedz! We are super happy that you decided to use our product to
enhance your business service quality.

To start, you need to reset your password.

Just click on the button below to start the process.
</x-mail::paragraph>

<x-mail::button>
Reset your password
</x-mail::button>

<x-mail::paragraph>
For any questions or clarifications, feel free to reach us on the email
contact@qrfeedz.ch.
</x-mail::paragraph>

Regards,<br>
QRFeedz team
</x-mail::message>
