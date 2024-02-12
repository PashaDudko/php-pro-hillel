<?php
interface EveryBird
{
    public function eat();
}

interface FlyBird
{
    public function fly();
}

class Swallow implements EveryBird, FlyBird
{
public function eat() { ... }
public function fly() { ... }
}

class Ostrich implements EveryBird
{
public function eat() { ... }

}