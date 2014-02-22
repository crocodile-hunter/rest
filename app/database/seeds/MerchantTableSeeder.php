<?php

use Faker\Factory as Faker;

class MerchantTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Merchant::create( 
                array(
                'name'  => $faker->company,
                'url'   => $faker->url,
                
                )
            );

            
        }
    }

}