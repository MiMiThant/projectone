<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UserTable;
use Helpers\HTTP;
use Helpers\Auth;

$user=Auth::check();

$table=new UserTable(new MySQL);

$name=$_FILES['photo']['name'];
$error = $_FILES['photo']['error'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];

if($type==="image/jpeg" or $type="image/png")
{
    move_uploaded_file($tmp,"photos/$name");
    $table->updatedPhoto($user->id,$name);
    $user->photo=$name;

    HTTP::redirect("/profile.php");

}else{
    HTTP::redirect("/profile.php","error=type");
}


// if($error) {
// header('location: ../profile.php?error=file');
// exit();
// }
// if($type === "image/jpeg" or $type === "image/png") {
// move_uploaded_file($tmp, "photos/profile.jpg");
// header('location: ../profile.php');
// } else {
// header('location: ../profile.php?error=type');
// }