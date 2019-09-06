<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClientSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductImageSeeder::class);
    }
}
