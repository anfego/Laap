<?php

class CustomerSeeder extends DatabaseSeeder
{
  public function run()
  {
    $customers = [
      [
        "name"    =>  "Optica Pereira",
        "address" =>  "Calle 22 #6-20",
        "telephone" =>  "23545514",
        "email"    => "pereira@gmail.com",
        "discount"  => "10.5"
      ]
    ];

    foreach ($customers as $customer) {
      Customer::create($customer);
    }
  }
}