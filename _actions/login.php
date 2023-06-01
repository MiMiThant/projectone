<?php

include("../vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UserTable;
use Helpers\HTTP;

$email=$_POST['email'];
$password=$_POST['password'];

$table=new UserTable(new MySQL);
$user=$table->findByEmailAndPassword($email,$password);

echo '<pre>';
var_dump($user);
echo '</pre>';

die();

if($user){
    if($user->suspended){
        HTTP::redirect("/index.php","suspended=true");
    }
    session_start();
    $_SESSION['user']=$user;
    HTTP::redirect("/profile.php");
}

HTTP::redirect("/index.php","incorrect=login");


// session_start();

// $email=$_POST['email'];
// $password=$_POST['password'];

// if($email==='alice@gmail.com' and $password==='alice'){
//     $_SESSION['user']=['username'=> "Alice"];
//     header('location: ../profile.php');
// }else{
//     header('location: ../index.php?incorrect=1');
// }