<?php

use Illuminate\Database\Seeder;

class wishlist extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) { 
            DB::table('wishlists')->insert([

            'user_id' => 1,
            'wishlist_name' => 'wish'.$i,
            ]);
    }
    }
}
