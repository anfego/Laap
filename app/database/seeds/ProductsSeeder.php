<?php

class ProductsSeeder extends DatabaseSeeder
{
  public function run()
  {
    $products = [
      [
        "name"        =>  "Bisel Sencillo",
        "price"       =>  "1500.00",
        "level"       =>  "standard",
        "status"      =>  "active",
        "updated_by"  =>  "admin"
      ],
      [
        "name"        =>  "Ranura",
        "price"       =>  "1000.00",
        "level"       =>  "special",
        "status"      =>  "active",
        "updated_by"  =>  "admin"
      ]
    ];

    foreach ($products as $product) {
      LabProducts::create($product);
    }
  }
}