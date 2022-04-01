<?php
declare(strict_types=1);

class Color
{
    private int $red;
    private int $green;
    private int $blue;


    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRed(): int
    {
        return $this->red;
    }

    private function setRed(int $red): void
    {
        $this->validate($red);

        $this->red = $red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    private function setGreen(int $green): void
    {
        $this->validate($green);

        $this->green = $green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    private function setBlue(int $blue): void
    {
        $this->validate($blue);

        $this->blue = $blue;
    }

    private function validate($value)
    {
        if ($value < 0 || $value > 255) {
            throw new Exception('This color is not exist');
        }
    }

    public function equals(Color $color): bool
    {
        return $this->getRed() === $color->getRed() &&
            $this->getGreen() === $color->getGreen() &&
            $this->getBlue() === $color->getBlue();
    }

    public static function randColor(): Color
    {
        return new Color(rand(0, 255), rand(0, 255), rand(0, 255));
    }

    public function mix(Color $color): Color
    {
        return new Color((int)(($this->getRed() + $color->getRed()) / 2),
            (int)(($this->getGreen() + $color->getGreen()) / 2),
            (int)(($this->getBlue() + $color->getBlue()) / 2));
    }


}

$color1 = Color:: randColor();

$color = new Color(200, 200, 200);
$mixedColor = $color->mix(new Color(100, 100, 100));
$mixedColor->getRed(); // 150
$mixedColor->getGreen(); // 150
$mixedColor->getBlue(); // 150

if (!$color->equals($mixedColor)) {
    echo 'Colors are not equal' . '<br>';
}

