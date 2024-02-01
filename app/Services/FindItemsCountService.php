<?php

namespace App\Services;

class FindItemsCountService
{
    public function findRepeatingItems(array $arr)
    {
        $elementCount = [];
        $repeatingItems = [];

        foreach ($arr as $element) {
            if (isset($elementCount[$element])) {
                $elementCount[$element]++;
            } else {
                $elementCount[$element] = 1;
            }

            if ($elementCount[$element] > 1) {
                $repeatingItems[] = $element;
            }
        }

        return $repeatingItems;
    }
}
