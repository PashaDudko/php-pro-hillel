<?php

interface TaxiInterface
{
    public function showCarModel(): string;
    public function showCarPrice(): string;
}

class EconomTaxi implements TaxiInterface
{
    public function showCarModel(): string
    {
        return "your car is: lanus";
    }

    public function showCarPrice(): string
    {
        return "this is the lowest price - 1$";
    }
}

class StandartTaxi implements TaxiInterface
{
    public function showCarModel(): string
    {
        return "your car is: toyota";
    }

    public function showCarPrice(): string
    {
        return "this is the standart price - 10$";
    }
}

class LuxTaxi implements TaxiInterface
{
    public function showCarModel(): string
    {
        return "your car is: bmw";
    }

    public function showCarPrice(): string
    {
        return "this is the highest price - 100$";
    }
}

class Order
{
    public function chooseCar(int $type): TaxiInterface
    {
        switch ($type) {
            case 1:
                return new StandartTaxi();
            case 2:
                return new StandartTaxi();
            case 3:
            default:
                return  new LuxTaxi();
        }
    }
}

$order = new Order();
$car = $order->chooseCar(1);