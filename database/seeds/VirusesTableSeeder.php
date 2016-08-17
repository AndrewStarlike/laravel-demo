<?php

use Illuminate\Database\Seeder;

class VirusesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('viruses')->insert([
            'id' => 1,
            'name' => 'Microsoft virus',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
            . 'Duis non volutpat lorem, eu rutrum massa.',
            'discovered_at' => '2016-02-01',
            'active' => 1
        ]);
        DB::table('viruses')->insert([
            'id' => 2,
            'name' => 'MacOS virus',
            'description' => 'Morbi eget ex vitae augue imperdiet cursus. '
            . 'Integer sit amet elit id magna interdum auctor at at sem.',
            'discovered_at' => '2016-03-05',
            'active' => 0
        ]);
    }

}
