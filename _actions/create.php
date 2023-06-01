<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UserTable;
use Helpers\HTTP;

$table=new UserTable(new MySQL);
$table->insert([
    "name"=>$_POST['name'],
    "email"=>$_POST['email'],
    "phone"=>$_POST['phone'],
    "address"=>$_POST['address'],
    "password"=>$_POST['password'],
]);

HTTP::redirect("/index.php","register=success");