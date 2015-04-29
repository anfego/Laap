<?php
 
class PersonSeeder extends DatabaseSeeder
{
  public function run()
  {
    $people = [
      [
        "personal_id"   => "1088239243",
        "first_name"    => "Orlando",
        "last_name"     => "Gomez Duque",
        "dob"           => "1960/02/02",
        "email"         => "orlandogomez@gmail.com",
        "updated_by"    => "seed"
      ]
    ];
  
    foreach ($people as $person) {
      Person::create($person);
    }
  }
}