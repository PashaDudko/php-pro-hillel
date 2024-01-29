<?php

class ValueObject
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

    public function setRed(int $value): void
    {
        if ($this->validate($value)) {
            $this->red = $value;
        } else {
            $this->showError($value);
        }
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function setGreen(int $value): void
    {
        if ($this->validate($value)) {
            $this->green = $value;
        } else {
            $this->showError($value);
        }
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function setBlue(int $value): void
    {
        if ($this->validate($value)) {
            $this->blue = $value;
        } else {
            $this->showError($value);
        }
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    private function validate(int $newValue): bool
    {
        return $newValue >= 0 && $newValue <= 255;
    }

    private function showError(int $value): string
    {
        return "Expects new color value from 0 to 255, got: {$value}";
    }

    public function equals(ObjectValue $color1, ObjectValue $color2): bool
    {
        return
            ($color1->getRed() == $color2->getRed()) &&
            ($color1->getGreen() == $color2->getGreen()) &&
            ($color1->getBlue() == $color2->getBlue());
    }

    public static function random(): ValueObject
    {
        return new ValueObject(random_int(0,255), random_int(0,255), random_int(0,255));
    }

    public function mix(ValueObject $color1, ValueObject $color2, ValueObject $color3): ValueObject
    {
        $averageRed = ($color1->getRed() + $color2->getRed() + $color3->getRed())/3;
        $averageGreen = ($color1->getGreen() + $color2->getGreen() + $color3->getGreen())/3;
        $averageBlue = ($color1->getBlue() + $color2->getBlue() + $color3->getBlue())/3;

        return new ValueObject ($averageRed, $averageGreen, $averageBlue);
    }
}