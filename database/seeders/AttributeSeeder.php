<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'en'    => 'Brand',
                'km'    => 'ម៉ាក',
                'slug'  => 'brand',
                'values' => [
                    'Apple',
                    'OnePlus',
                    'Huawei',
                    'Samsung',
                    'Xiaomi',
                    'ZTE',
                    'ASUS',
                    'GOOGLE',
                    'LG',
                    'TCL',
                    'SONY'
                ]
            ],
            [
                'en'    => 'Processor Brand',
                'km'    => 'Processor Brand',
                'slug'  => 'processor-brand',
                'values' => [
                    'INTEL',
                    'AMD',
                    'SNAPDRAGON',
                    'MEDIATEK',
                    'A11 BIONIC',
                    'A10 FUSION',
                ]
            ],
            [
                'en'    => 'Processor',
                'km'    => 'Processor',
                'slug'  => 'processor',
                'values' => [
                    '10th Gen. Intel Core i7',
                    '10th Gen. Intel Core i5',
                    'Kirin 990 5G (7 nm+)',
                    'Apple A13 Bionic (7 nm+)',
                    'Qualcomm SM8250 Snapdragon 865 (7 nm+)',
                    'Qualcomm SM8250 Snapdragon 865 (7 nm+)',
                ]
            ],

        ];
        foreach ($data as  $value) {
            $model =  Attribute::create([
                'slug' => $value['slug'],
                'attribute_set_id' => 1,
            ]);
            $model->translations()->create([
                'locale'  => 'en',
                'name'    => $value['en'],
            ]);
            $model->translations()->create([
                'locale'  => 'km',
                'name'    => $value['km'],
            ]);
            foreach ($value['values'] as $key => $v) {
                $val =  $model->values()->create([]);
                $val->translations()->create([
                    'locale' => 'en',
                    'name' => $v
                ]);
                $val->translations()->create([
                    'locale' => 'km',
                    'name' => $v
                ]);
            }

        }
    }
}
