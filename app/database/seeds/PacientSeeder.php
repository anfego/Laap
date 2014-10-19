<?php
 
class PacientSeeder extends DatabaseSeeder
{
  public function run()
  {
    $pacients = [
      [
        "first_name"    => "Orlando",
        "last_name"     => "Gomez Duque",
        "address_home"  => "cra 6",
        "telephone"     => "Orlando",
        "email"         => "andresgreen@gmail.com"
      ]
    ];
  
    foreach ($pacients as $pacient) {
      Pacient::create($pacient);
    }
  }
}