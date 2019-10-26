<?php

use App\Address;
use Illuminate\Database\Seeder;

class AddressessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Address::class, 10)->create();
    }
}
