<?php

namespace App\Services;

class GroupByOwnersService
{
    public function groupByOwners(array $files)
    {
        $result = [];

        foreach ($files as $file => $owner) {
            $result[$owner][] = $file;
        }

        return $result;
    }
}
