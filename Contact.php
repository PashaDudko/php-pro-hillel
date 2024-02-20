<?php

class Contact {
    private $name;
    private $surname;
    private $email;
    private $phone;
    private $address;

//    public function __construct($name, $surname, $email, $phone, $address)
//    {
//        $this->name = $name;
//        $this->surname = $surname;
//        $this->email = $email;
//        $this->phone = $phone;
//        $this->address = $address;
//    }

    public function name(string $value): object
    {
        $this->name = $value;

        return $this;
    }

    public function surname(string $value): object
    {
        $this->surname = $value;

        return $this;
    }

    public function email(string $value): object
    {
        $this->email = $value;

        return $this;
    }

    public function phone(string $value): object
    {
        $this->phone = $value;

        return $this;
    }

    public function address(string $value): object
    {
        $this->address = $value;

        return $this;
    }

    public function build(): object
    {
        return clone $this;
    }
}