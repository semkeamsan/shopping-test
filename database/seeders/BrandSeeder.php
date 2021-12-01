<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
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
                'en'    => 'Apple',
                'km'    => 'Apple',
                'slug'  => 'apple',
            ],
            [
                'en'    => 'HP',
                'km'    => 'HP',
                'slug'  => 'hp',
            ],
            [
                'en'    => 'Dell',
                'km'    => 'Dell',
                'slug'  => 'dell',
            ],
            [
                'en'    => 'Acer',
                'km'    => 'Acer',
                'slug'  => 'acer',
            ],
            [
                'en'    => 'Asus',
                'km'    => 'Asus',
                'slug'  => 'asus',
            ],
            [
                'en'    => 'Microsoft',
                'km'    => 'Microsoft',
                'slug'  => 'microsoft',
            ],
        ];
        foreach ($data as  $value) {
            $model =  Brand::create([
                'slug' => $value['slug'],
                'logo' => asset('images/default.png'),
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
