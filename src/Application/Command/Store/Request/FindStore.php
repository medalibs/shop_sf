<?php

namespace App\Application\Command\Store\Request;

use App\Application\Common\Request\Pagination;

class FindStore extends Pagination
{
    public const DISTANCE = 10;

    private string $name;
    private int $distance;
    private float $latitude;
    private float $longitude;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->name = $data['name'] ?? '';
        $this->distance = $data['distance'] ?? self::DISTANCE;
        $this->latitude = $data['latitude'] ?? 0;
        $this->longitude = $data['longitude'] ?? 0;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getDistance(): int
    {
        return $this->distance;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

}