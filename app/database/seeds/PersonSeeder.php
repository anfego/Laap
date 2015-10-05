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
                "updated_by"    => "seed"
            ],
            [
                "personal_id"   => "15464216613",
                "first_name"    => "Andres",
                "last_name"     => "Castillo",
                "dob"           => "1986/05/06",
                "updated_by"    => "seed"
            ],
            [
                "personal_id"   => "86546313",
                "first_name"    => "Sara",
                "last_name"     => "Mejia",
                "dob"           => "1990/11/10",
                "updated_by"    => "seed"
            ]
        ];
      
        foreach ($people as $person) {
            Person::create($person);
        }
    }
}