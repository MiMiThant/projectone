<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UserTable;
use Helpers\HTTP;

$id=$_GET['id'];

$table=new UserTable(new MySQL);
$table->unsuspended($id);

HTTP::redirect("/admin.php");
