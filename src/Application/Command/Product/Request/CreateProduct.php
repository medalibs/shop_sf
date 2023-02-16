<?php

namespace App\Application\Command\Product\Request;

class CreateProduct
{
    public function __construct(private readonly string $name, private readonly string $image)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImage(): string
    {
        return $this->image;
    }
}
