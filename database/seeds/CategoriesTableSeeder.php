<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = factory(App\Category::class, 3)->create()->each(function(App\Category $category){
            factory(App\SubCategory::class, 3)->create(['category_id' => $category->id]);
            factory(App\Product::class, 5)->create(['category_id' => $category->id])->each(function(App\Product $product){
                factory(App\ProductImage::class, 3)->create(['product_id' => $product->id]);
            });
        });

        

    }
}
