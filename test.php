<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UserTable;

$table=new UserTable(new MySQL);
$table->insert([
    "name"=>"John",
    "email"=>"john@gmail.com",
    "phone"=>"222333",
    "address"=>"MDY",
    "password"=>"john"
]);

print_r($table->getAll());

// $mysql=new MySQL;
// $db=$mysql->connect();

// $result=$db->query("SELECT * FROM roles");
// print_r($result->fetchAll());

// use Helpers\Auth;
// $user=Auth::check();
// print_r($user);


// use Helpers\HTTP;
// HTTP::redirect("/index.php","redirect=test");
