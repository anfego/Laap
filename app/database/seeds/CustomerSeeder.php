<?php

class CustomerSeeder extends DatabaseSeeder
{
  public function run()
  {
    $customers = [
      [
        "name"        => "Optica Pereira",
        "address"     => "Calle 22 #6-20",
        "telephone"   => "23545514",
        "email"       => "andresgreen@gmail.com",
        "discountStd" => "10.5",
        "discountSpc" => "0.0",
        "updated_by"  => "Admin"
      ]
    ];

    foreach ($customers as $customer) {
      LabCustomer::create($customer);
    }
  }
}