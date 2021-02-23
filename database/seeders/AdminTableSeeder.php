<?php

namespace Database\Seeders;

use Dcat\Admin\Models\Menu;
use Dcat\Admin\Models\Permission;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createdAt = date('Y-m-d H:i:s');

        // Create a permission
        Permission::insert([
            [
                'name' => 'Banners',
                'slug' => 'banners',
                'http_method' => '',
                'http_path'   => '/auth/banners*',
                'order'       => 7,
                'parent_id'   => 1,
                'created_at'    => $createdAt,
            ],
            [
                'name' => 'Categories',
                'slug' => 'categories',
                'http_method' => '',
                'http_path'   => '/auth/categories*',
                'order'       => 8,
                'parent_id'   => 1,
                'created_at'    => $createdAt,
            ],
            [
                'name' => 'Blocks',
                'slug' => 'blocks',
                'http_method' => '',
                'http_path'   => '/auth/blocks*',
                'order'       => 9,
                'parent_id'   => 1,
                'created_at'    => $createdAt,
            ],
            [
                'name' => 'Langs',
                'slug' => 'langs',
                'http_method' => '',
                'http_path'   => '/auth/langs*',
                'order'       => 10,
                'parent_id'   => 1,
                'created_at'    => $createdAt,
            ],
            [
                'name' => 'News',
                'slug' => 'news',
                'http_method' => '',
                'http_path'   => '/auth/news*',
                'order'       => 11,
                'parent_id'   => 1,
                'created_at'    => $createdAt,
            ],
        ]);

        // Create a menu
        Menu::insert([
            [
                'parent_id'     => 0,
                'order'         => 8,
                'title'         => 'Banners',
                'icon'          => 'fa-image',
                'uri'           => 'auth/banners',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 0,
                'order'         => 9,
                'title'         => 'Categories',
                'icon'          => 'fa-bars',
                'uri'           => 'auth/categories',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 0,
                'order'         => 10,
                'title'         => 'Blocks',
                'icon'          => 'fa-stop-circle',
                'uri'           => 'auth/blocks',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 0,
                'order'         => 11,
                'title'         => 'Langs',
                'icon'          => 'fa-language',
                'uri'           => 'auth/langs',
                'created_at'    => $createdAt,
            ],
            [
                'parent_id'     => 0,
                'order'         => 12,
                'title'         => 'News',
                'icon'          => 'fa-newspaper-o',
                'uri'           => 'auth/news',
                'created_at'    => $createdAt,
            ],
        ]);
    }
}
