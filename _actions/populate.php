<?php

include("../vendor/autoload.php");


use Faker\Factory as Faker;
use Libs\Database\MySQL;
use Libs\Database\UserTable;

$faker=Faker::create();
$table=new UserTable(new MySQL);

echo "Starting population..<br>";

for($i=1;$i<20;$i++)
{
    $table->insert([
        "name"=>$faker->name,
        "email"=>$faker->email,
        "phone"=>$faker->phoneNumber,
        "address"=>$faker->address,
        "password"=>"password",
    ]);
}

echo "Done Population";
