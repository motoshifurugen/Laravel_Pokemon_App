<?php

use Illuminate\Database\Seeder;
use App\Attribute;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attribute_names = [
            'ノーマル', 'ほのお', 'みず', 'くさ', 'でんき', 'こおり', 'かくとう', 'どく', 'じめん', 'ひこう', 'エスパー', 'むし', 'いわ', 'ゴースト', 'ドラゴン', 'あく', 'はがね', 'フェアリー'
        ];

        foreach ($attribute_names as $attribute_name) {
            Attribute::create([
                'name' => $attribute_name
            ]);
        }
    }
}
