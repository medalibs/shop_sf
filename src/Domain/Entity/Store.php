<?php

namespace App\Domain\Entity;

class Store
{
    private ?int $id = null;

    private ?string $name = null;

    private ?float $latitude = null;

    private ?float $longitude = null;

    private ?string $address = null;

    private ?StoreManager $storeManager = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getStoreManager(): ?StoreManager
    {
        return $this->storeManager;
    }

    public function setStoreManager(?StoreManager $storeManager): self
    {
        $this->storeManager = $storeManager;

        return $this;
    }
}