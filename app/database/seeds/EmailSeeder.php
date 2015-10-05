<?php
 
class EmailSeeder extends DatabaseSeeder
{
    public function run()
    {
        $emails = [
            [
                "person_id"     => "1",
                "ref_name"      => "Personal",
                "email"         => "orlando.gomez@gmail.com",
                "active"        => false,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "1",
                "ref_name"      => "Trabajo",
                "email"         => "orlando.gomez@yahoo.com",
                "active"        => true,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "2",
                "ref_name"      => "Personal",
                "email"         => "andres.castillo@gmail.com",
                "active"        => true,
                "updated_by"    => "seed"
            ]
        ];
      
        foreach ($emails as $email) {
            Email::create($email);
        }
    }
}