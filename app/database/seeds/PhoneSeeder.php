<?php
 
class PhoneSeeder extends DatabaseSeeder
{
    public function run()
    {
        $phones = [
            [
                "person_id"     => "1",
                "ref_name"      => "Casa",
                "area_code"     => "576",
                "phone"         => "3240536",
                "active"        => true,
                "primary"       => true,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "1",
                "ref_name"      => "Trabajo",
                "area_code"     => "576",
                "phone"         => "3252132",
                "active"        => false,
                "primary"       => false,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "2",
                "ref_name"      => "Trabajo",
                "area_code"     => "574",
                "phone"         => "3381146",
                "active"        => true,
                "primary"       => true,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "3",
                "ref_name"      => "Oficina",
                "area_code"     => "576",
                "phone"         => "3131631",
                "active"        => true,
                "primary"       => true,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "3",
                "ref_name"      => "Casa",
                "area_code"     => "576",
                "phone"         => "1313513",
                "active"        => true,
                "primary"       => false,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "3",
                "ref_name"      => "Celular",
                "area_code"     => "300",
                "phone"         => "9846332",
                "active"        => true,
                "primary"       => false,
                "updated_by"    => "seed"
            ]

        ];
      
        foreach ($phones as $phone) {
            Phone::create($phone);
        }
    }
}