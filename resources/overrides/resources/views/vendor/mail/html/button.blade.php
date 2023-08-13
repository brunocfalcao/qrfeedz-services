@props([
    'url' => '#',
    'background_color' => '#2196F3',
    'foreground_color' => '#FFFFFF'
])
<!-- button -->
<!-- Button -->
<tr>
    <td align="center" style="padding: 15px 30px;">
        <table border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" style="background-color: #007bff; border-radius: 5px;">
                    <a href="{{ $url }}" style="display: block; padding: 10px 20px; color: #ffffff; text-decoration: none;">{{ $slot }}</a>
                </td>
            </tr>
        </table>
    </td>
</tr>
<!-- /button -->
