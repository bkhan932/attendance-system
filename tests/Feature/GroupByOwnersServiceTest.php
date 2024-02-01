<?php
namespace Tests\Feature;

use App\Services\GroupByOwnersService;
use Tests\TestCase;

class GroupByOwnersServiceTest extends TestCase
{
    /** @test */
    public function test_group_files_by_owners()
    {
        $groupByOwnersService = new GroupByOwnersService();

        $files = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B",
        ];

        $result = $groupByOwnersService->groupByOwners($files);

        $this->assertEquals([
            "Company A" => ["insurance.txt", "letter.docx"],
            "Company B" => ["Contract.docx"],
        ], $result);
    }
}
