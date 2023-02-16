<?php

namespace App\Application\Common\Request;

class Pagination
{
    public const LIMIT = 10;
    public const PAGE = 1;

    private int $limit;
    private int $page;

    public function __construct(array $data)
    {
        $this->limit = $data['limit'] ?? self::LIMIT;
        $this->page = $data['page'] ?? self::PAGE;
    }
    public function getLimit(): int
    {
        return $this->limit;
    }
    public function getPage(): int
    {
        return $this->page;
    }
}
