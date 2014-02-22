<?php

use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Product::create( 
                array(
                'SKU'          => $faker->randomNumber(13),
                'seller_name'  => $faker->company,
                'title'        => $faker->sentence,
                'description'  => $faker->text,
                'price'        => $faker->randomNumber(4),
                'created_at'   => $faker->dateTime
                )
            );

            
        }
    }

}