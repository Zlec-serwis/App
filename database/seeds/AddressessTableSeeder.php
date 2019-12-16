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
        //factory(Address::class, 10)->create();
        DB::table('Addresses')->insert([
            ['city' => 'Warszawa', 'province' => 'mazowieckie'],
            ['city' => 'Kraków', 'province' => 'małopolskie'],
            ['city' => 'Poznań', 'province' => 'wielkopolskie'],
            ['city' => 'Łódź', 'province' => 'łódzkie'],
            ['city' => 'Katowice', 'province' => 'śląskie'],
            ['city' => 'Wrocław', 'province' => 'dolnośląskie'],
        ]);

    }
}
