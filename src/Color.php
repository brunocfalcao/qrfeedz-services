<?php

namespace QRFeedz\Services;

use Illuminate\Support\Str;
use Spatie\Color\Hex;

class Color
{
    public $primary;

    public static function make(
        string $color,
    ) {
        return new self($color);
    }

    public function __construct(
        string $color,
    ) {
        // Main colors.
        $this->color = Str::startsWith($color, '#') ? $color : '#'.$color;
    }

    public function complementary()
    {
        $color = Hex::fromString($this->color);
        return $color->complementary()->toHex();
    }

    public function isLight()
    {
        return $this->color->toHsl()->getLuminance() > 0.5;
    }

    public function isDark()
    {
        return $this->color->toHsl()->getLuminance() <= 0.5;
    }

    public function is()
    {
        return $this->isDark() ? 'dark' : 'light';
    }
}
