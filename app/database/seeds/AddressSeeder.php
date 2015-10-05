<?php
 
class AddressSeeder extends DatabaseSeeder
{
    public function run()
    {
        $addreses = [
            [
                "person_id"     => "1",
                "ref_name"      => "Casa",
                "state"         => "Risaralda",
                "city"          => "Pereira",
                "street_l1"     => "Calle 22 # 6-38",
                "street_l2"     => "Local 1",
                "street_l3"     => null,
                "active"        => true,
                "primary"       => true,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "1",
                "ref_name"      => "Trabajo",
                "state"         => "Risaralda",
                "city"          => "Pereira",
                "street_l1"     => "Calle 22 # 6-38",
                "street_l2"     => "Local 1",
                "street_l3"     => null,
                "active"        => false,
                "primary"       => false,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "2",
                "ref_name"      => "Trabajo",
                "state"         => "Antioquia",
                "city"          => "Medellin",
                "street_l1"     => "Carrera 80 $20-192",
                "street_l2"     => "Primer piso",
                "street_l3"     => "32113",
                "active"        => true,
                "primary"       => true,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "3",
                "ref_name"      => "Oficina",
                "state"         => "Risaralda",
                "city"          => "Pereira",
                "street_l1"     => "Calle 22 # 6-38",
                "street_l2"     => "Local 1",
                "street_l3"     => null,
                "active"        => true,
                "primary"       => true,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "3",
                "ref_name"      => "Casa",
                "state"         => "Risaralda",
                "city"          => "Pereira",
                "street_l1"     => "Calle 22 # 6-38",
                "street_l2"     => "Local 1",
                "street_l3"     => null,
                "active"        => true,
                "primary"       => false,
                "updated_by"    => "seed"
            ],
            [
                "person_id"     => "3",
                "ref_name"      => "Trabajo",
                "state"         => "Risaralda",
                "city"          => "Pereira",
                "street_l1"     => "Calle 22 #11-232",
                "street_l2"     => null,
                "street_l3"     => null,
                "active"        => true,
                "primary"       => false,
                "updated_by"    => "seed"
            ]

        ];
      
        foreach ($addreses as $address) {
            Address::create($address);
        }
    }
}