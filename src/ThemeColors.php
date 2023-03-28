<?php

namespace QRFeedz\Services;

use Illuminate\Support\Str;
use Mexitek\PHPColors\Color;

class ThemeColors
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

    protected function apply(string $color)
    {
        $this->color = new Color("#336699");

        return $this;
    }

    /**
     * Theme methods to obtain the variations to populate the
     * questionnaire theme colors. They are all changeable, but the first
     * version is given by these methods.
     *
     * The main typographic colors are:
     * primary, secondary, info (default: dark gray), warning (default: red).
     *
     * The computed colors are:
     * header('background'): If primary == light then will be primary.darken()
     *                       and vice-versa.
     *
     * content('background'): Default will be white.
     *
     * footer('background'): Assumes initially same as header('background').
     * footer('links'): Same logic as header('background') but in contrary.
     *
     * All these computed colors can be overriden in the questionnaire colors.
     */
}
