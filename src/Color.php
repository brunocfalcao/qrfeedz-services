<?php

namespace QRFeedz\Services;

use Illuminate\Support\Str;
use Spatie\Color\Hex;

class Color
{
    protected $color;

    public static function make(string $color)
    {
        return (new self())->apply($color);
    }

    public function __construct()
    {
        //
    }

    public function apply(string $color)
    {
        $this->color = Hex::fromString(
            Str::startsWith($color, '#') ? $color : '#'.$color
        );

        return $this;
    }

    /**
     * Check if a color is light or dark.
     * @return boolean
     */
    public function isLight()
    {
        return $this->color
                    ->toHsl()
                    ->getLuminance() > 0.5;
    }

    /**
     * Check if a color is light or dark.
     * @return boolean
     */
    public function isDark()
    {
        return $this->color
                    ->toHsl()
                    ->getLuminance() <= 0.5;
    }

    /**
     * Returns a darken color.
     *
     * @param  int    $percentage
     * @return string
     */
    public function darken(int $percentage)
    {
        return $this->color
                    ->darken($percentage)
                    ->toHex();
    }

    /**
     * Returns a lighter color.
     *
     * @param  int    $percentage
     * @return string
     */
    public function lighten(int $percentage)
    {
        return $this->color
                    ->lighten($percentage)
                    ->toHex();
    }

    public function __get($name)
    {
        return $this->$name();
    }

    protected function complementary()
    {
        return (string) $this->color->complementary()->toHex();
    }

    protected function original()
    {
        return (string) $this->color->toHex();
    }
}
