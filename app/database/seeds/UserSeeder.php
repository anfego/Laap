<?php
 
class UserSeeder extends DatabaseSeeder
{
  public function run()
  {
    $users = [
      [
        "username" => "andres.gomez",
        "password" => Hash::make("1234"),
        "email"    => "andresgreen@gmail.com"
      ]
    ];
  
    foreach ($users as $user) {
      User::create($user);
    }
  }
}