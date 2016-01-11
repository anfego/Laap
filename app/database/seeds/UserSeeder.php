<?php
 
class UserSeeder extends DatabaseSeeder
{
  public function run()
  {
    $users = [
      [
        "username" => "andres.gomez",
        "password" => Hash::make("1234"),
        "first_name" => "Andres Felipe",
        "last_name" => "Gomez Castillo",
        "prefered_name" => "Andres F. Gomez",
        "title" => "Admin",
        "email" => "andresgreen@gmail.com"
      ],
      [
        "username" => "mafe.gomez",
        "password" => Hash::make("9876"),
        "first_name" => "Maria Fernanda",
        "last_name" => "Gomez Castillo",
        "prefered_name" => "Maria F. Gomez",
        "title" => "Optometra",
        "email" => "mariafgomez@galeriaoptica.com"
      ],
      [
        "username" => "jorge.alzate",
        "password" => Hash::make("9632"),
        "first_name" => "Jorge Augusto",
        "last_name" => "Alzate Gomez",
        "prefered_name" => "Jorge A. Alzate",
        "title" => "Optometra",
        "email" => "jorge.alzate@galeriaoptica.com"
      ],

    ];
  
    foreach ($users as $user) {
      User::create($user);
    }
  }
}