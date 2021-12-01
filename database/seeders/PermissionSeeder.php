<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
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
                'role_id' => 1,
                'en'    => 'Tags',
                'km'    => 'Tags',
                'slug' => 'tag',
                'routes' => collect(['index', 'create-store', 'edit-update', 'show', 'destroy']),
                'icon' => 'fal',
            ],
            [
                'role_id' => 1,
                'en'    => 'Attribute Sets',
                'km'    => 'សំណុំគុណលក្ខណៈ',
                'slug' => 'attribute-set',
                'routes' => collect(['index', 'create-store', 'edit-update', 'show', 'destroy']),
                'icon' => 'fal',
            ],
            [
                'role_id' => 1,
                'en'    => 'Attribute',
                'km'    => 'គុណលក្ខណៈ',
                'slug' => 'attribute',
                'routes' => collect(['index', 'create-store', 'edit-update', 'show', 'destroy']),
                'icon' => 'fal',
            ],
            [
                'role_id' => 1,
                'en'    => 'Option',
                'km'    => 'ជម្រើស',
                'slug' => 'option',
                'routes' => collect(['index', 'create-store', 'edit-update', 'show', 'destroy']),
                'icon' => 'fal',
            ],
            [
                'role_id' => 1,
                'en'    => 'Brand',
                'km'    => 'ម៉ាក',
                'slug' => 'brand',
                'routes' => collect(['index', 'create-store', 'edit-update', 'show', 'destroy']),
                'icon' => 'fal',
            ],
            [
                'role_id' => 1,
                'en'    => 'Categories',
                'km'    => 'ប្រភេទ',
                'slug' => 'category',
                'routes' => collect(['index', 'create-store', 'edit-update', 'show', 'destroy', 'p']),
                'icon' => 'fal fa-layer-group',
            ],
            [
                'role_id' => 1,
                'en'    => 'Products',
                'km'    => 'ផលិតផល',
                'slug' => 'product',
                'routes' => collect(['index', 'create-store', 'edit-update', 'show', 'destroy']),
                'icon' => 'fal fa-cube',
            ],
            [
                'role_id' => 1,
                'en'    => 'Permissions',
                'km'    => 'ការអនុញ្ញាត',
                'slug' => 'permission',
                'routes' => collect(['index', 'create-store', 'edit-update', 'show', 'destroy']),
                'icon' => 'fal fa-shield-alt',
            ],
            [
                'role_id' => 1,
                'en'    => 'Roles',
                'km'    => 'តួនាទី',
                'slug' => 'role',
                'routes' => collect(['index', 'create-store', 'edit-update', 'show', 'destroy']),
                'icon' => 'fal fa-user-shield',
            ],
            [
                'role_id' => 1,
                'en'    => 'Users',
                'km'    => 'អ្នកប្រើប្រាស់',
                'slug' => 'user',
                'routes' => collect(['index', 'create-store', 'edit-update', 'show', 'destroy']),
                'icon' => 'fal fa-users',
            ],
            [
                'role_id' => 1,
                'en'    => 'Account',
                'km'    => 'គណនី',
                'slug' => 'account',
                'routes' => collect(['index', 'biography', 'email', 'password']),
                'icon' => 'fal fa-user',
            ],

            [
                'role_id' => 4,
                'en'    => 'Account',
                'km'    => 'គណនី',
                'slug' => 'account',
                'routes' => collect(['index', 'biography', 'email', 'password']),
                'icon' => 'fal fa-user',
            ],
        ];

        foreach ($data as  $value) {
            $model =  Permission::create([
                'role_id' => $value['role_id'],
                'routes' => $value['routes'],
                'slug' => $value['slug'],
                'icon' => $value['icon'],
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
