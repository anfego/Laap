<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('UserSeeder');
        $this->call('PersonSeeder');
        $this->call('PhoneSeeder');
        $this->call('EmailSeeder');
        $this->call('AddressSeeder');
    }

}
