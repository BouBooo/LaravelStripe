<?php

use App\Product;
use App\Category;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Mangue / Passion',
            'slug' => 'mangue-passion',
            'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.',
            'price' => 5,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.',
            'category_id' => Category::all()->random()->id
        ]);

        Product::create([
            'name' => 'Mangue / Coco',
            'slug' => 'mangue-coco',
            'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.',
            'price' => 5,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.',
            'category_id' => Category::all()->random()->id
        ]);

        Product::create([
            'name' => 'Mangue / Citron',
            'slug' => 'mangue-citron',
            'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.',
            'price' => 5,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.',
            'category_id' => Category::all()->random()->id
        ]);

        Product::create([
            'name' => 'Mangue / Cassis',
            'slug' => 'mangue-cassis',
            'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.',
            'price' => 5,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eros sem, ullamcorper quis odio suscipit, consectetur posuere tortor. Nunc ac fringilla mauris. Quisque eget ante libero.',
            'category_id' => Category::all()->random()->id
        ]);
    }
}
