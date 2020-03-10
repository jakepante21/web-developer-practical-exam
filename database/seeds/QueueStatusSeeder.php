<?php

use Illuminate\Database\Seeder;

class QueueStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("statuses")->insert([
        	"name" => "In Queue"
        ]);
        DB::table("statuses")->insert([
        	"name" => "Processing"
        ]);
    }
}
