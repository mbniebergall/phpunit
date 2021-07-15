<?php

declare(strict_types=1);

namespace Infrastructure;

class Db
{
    public function insert($table, array $bind): int
    {
        // do db insert
        return 1;
    }

    public function fetchAll($sql, array $bind = []): array
    {
        return [];
    }
}
