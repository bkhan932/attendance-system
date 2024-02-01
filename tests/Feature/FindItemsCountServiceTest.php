<?php

namespace Tests\Feature;

use App\Services\FindItemsCountService;
use Tests\TestCase;

class FindItemsCountServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_finds_repeating_items_in_an_array()
    {
        $findItemsCountService = new FindItemsCountService();

        $arr = [2, 3, 1, 2, 3];

        $result = $findItemsCountService->findRepeatingItems($arr);

        $this->assertEquals([2, 3], $result);
    }
}
