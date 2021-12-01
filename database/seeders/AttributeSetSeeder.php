<?php

namespace Database\Seeders;

use App\Models\AttributeSet;
use Illuminate\Database\Seeder;

class AttributeSetSeeder extends Seeder
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
                'slug'    => 'drone-specification',
                'en'    => 'Drone Specifications',
                'km'    => 'លក្ខណៈបច្ចេកទេសរបស់ Drone',
            ],
            [
                'slug'    => 'camera',
                'en'    => 'Camera',
                'km'    => 'កាមេរ៉ា',
            ],
            [
                'slug'    => 'hardware',
                'en'    => 'Hardware',
                'km'    => 'ផ្នែករឹង',
            ],
            [
                'slug'    => 'specification',
                'en'    => 'Specification',
                'km'    => 'ការបញ្ជាក់',
            ],

        ];
        foreach ($data as  $value) {
            $model =  AttributeSet::create([
                //'slug'  => $value['slug'],
            ]);
            $model->translations()->create([
                'locale'  => 'en',
                'name'    => $value['en'],
            ]);
            $model->translations()->create([
                'locale'  => 'km',
                'name'    => $value['km'],
            ]);
        }
    }
}
