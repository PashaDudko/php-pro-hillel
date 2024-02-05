<?php

class User
{
    private string $name;
    private string $email;
    private int $age;

    public function __call($name, $args=[])
    {
        try {
            return
                $this->$name($args);
        } catch (\Exception $e)
        {
            return $e->getMessage("function: {$name} is not found");
        }
    }

    private function setName(string $name):void
    {
        $this->name = $name;
    }
    private function getName(): string
    {
        return $this->name;
    }

    private function setEmail(string $email):void
    {
        $this->email = $email;
    }
    private function getEmail(): string
    {
        return $this->email;
    }

    private function setAge(int $age):void
    {
        $this->age = $age;
    }
    private function getAge(): int
    {
        return $this->age;
    }

    public function getAll(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'age' => $this->age,
        ];
    }
}