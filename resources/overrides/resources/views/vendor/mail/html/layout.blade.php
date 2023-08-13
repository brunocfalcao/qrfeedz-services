<!DOCTYPE html>
<html>
<head>
    <title>{{ $subject }}</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; font-size: 1.15rem">

    @isset($preview)
        <div style="display: none; max-height: 0px; overflow: hidden;">
        {{ $preview }}
        </div>

        <div style="display: none; max-height: 0px; overflow: hidden;">
        &#847; &zwnj; &nbsp; &#8199; &shy; &#847; &zwnj; &nbsp; &#8199; &shy; &#847; &zwnj; &nbsp; &#8199; &shy; &#847; &zwnj; &nbsp; &#8199; &shy; &#847; &zwnj; &nbsp; &#8199; &shy; &#847; &zwnj; &nbsp; &#8199; &shy; &#847; &zwnj; &nbsp; &#8199; &shy; &#847; &zwnj; &nbsp; &#8199; &shy;
        </div>
    @endisset

    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff;">

    {{ $header }}
    {{ $slot ?? '' }}
    {{ $footer }}

    </table>
</body>
</html>
