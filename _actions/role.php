<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UserTable;
use Helpers\HTTP;

$id=$_GET['id'];
$role=$_GET['role'];

$table=new UserTable(new MySQL);
$table->changeRole($id,$role);

HTTP::redirect("/admin.php");
