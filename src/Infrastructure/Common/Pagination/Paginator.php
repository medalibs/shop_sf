<?php

namespace App\Infrastructure\Common\Pagination;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Tools\Pagination\Paginator as OrmPaginator;
class Paginator
{
    private int $total;
    private int $lastPage;
    private int $page;
    private OrmPaginator $items;
    public function paginate($query, int $page = 1, int $limit = 10)
    {
        $paginator = new OrmPaginator($query);

        $paginator
            ->getQuery()
            ->setFirstResult($limit * ($page - 1))
            ->setMaxResults($limit);

        $this->total = $paginator->count();
        $this->lastPage = (int) ceil($paginator->count() / $paginator->getQuery()->getMaxResults());
        $this->items = $paginator;
        $this->page = $page;

        return $this;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getLastPage(): int
    {
        return $this->lastPage;
    }

    public function getItems(): OrmPaginator
    {
        return $this->items;
    }

    public function getResult():array
    {
        return [
            'total' => $this->getTotal(),
            'lastPage' => $this->getLastPage(),
            'page' => $this->page,
            'items' => $this->getItems()->getQuery()->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY),
        ];
    }
}