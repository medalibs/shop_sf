<?php

namespace App\Application\Command\StoreManager\Request;

class CreateStoreManager
{
    public function __construct(private string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}