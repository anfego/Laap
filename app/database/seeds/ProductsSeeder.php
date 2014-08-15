<?php

class ProductsSeeder extends DatabaseSeeder
{
  public function run()
  {
    $products = [
      [
        "name"    =>  "Bisel Sencillo",
        "price"   =>  "1500.00",
      ],
      [
        "name"    =>  "Ranura",
        "price"   =>  "1000.00",
      ]
    ];

    foreach ($products as $product) {
      Products::create($product);
    }
  }
}