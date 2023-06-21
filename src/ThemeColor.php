<?php

namespace QRFeedz\Services;

use Mexitek\PHPColors\Color;

class ThemeColor
{
    protected $color;

    public function __construct(string $color = null)
    {
        $this->color = is_null($color) ? $this->random() : new Color('#'.$color);
    }

    public static function make(string $color = null)
    {
        return new ThemeColor($color);
    }

    public function color()
    {
        return once(function () {
            return $this->color;
        });
    }

    /**
     * Receives a questionnaire model, and computes the header, content and
     * footer color variants. Returns an array. Later, the admin can
     * change these colors directly on the database.
     *
     * @return array
     */
    public function compute()
    {
        // Check if it's a light or dark color.
        $isLight = $this->color()->isLight();

        $result = collect([
            'primary' => $this->color()->getHex(),
            'complementary' => $this->color()->complementary(),
        ]);

        return $result->undot()->toArray();
    }

    protected function random()
    {
        $red = rand(0, 255);
        $green = rand(0, 255);
        $blue = rand(0, 255);
        $color = sprintf('%02x%02x%02x', $red, $green, $blue);

        return new Color('#'.$color);
    }
}
