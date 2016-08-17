<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('ratings')->insert([
            'virus_id' => 1,
            'rating' => 2,
            'ip_address' => '127.593.23.101'
        ]);
        DB::table('ratings')->insert([
            'virus_id' => 1,
            'rating' => 4,
            'ip_address' => '127.333.23.101'
        ]);
    }

}
