<?php

namespace Tests\Feature\Database;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use App\Monster;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDatabase()
    {
        // $this->assertTrue(
        //     Schema::hasColumns('monsters', [
        //         'id', 'name', 'attribute_id', 'region_id', 'size', 'weight', 'attack_name', 'attack_description'
        //     ]),
        //     1
        //     );
        $monster = new Monster();
        $monster->name = 'ピカチュウ';
        $monster->attribute_id = 2;
        $monster->region_id = 2;
        $monster->size = 50;
        $monster->weight = 1;
        $monster->attack_name = '10万ボルト';
        $monster->attack_description = '体から電気を放つ';
        $saveMonster = $monster->save();

        $this->assertTrue($saveMonster);
    }
}
