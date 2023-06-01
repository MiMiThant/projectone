<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <style>
        .wrap{
            width:100%;
            max-width: 400px;
            margin: 40px auto;
        }
    </style>
</head>
<body class="text-center">
   <div class="wrap">
   <h3>Register Form</h3>

   <form action="_actions/create.php" method="post">
        <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
        <input type="email" class="form-control mb-2" name="email" placeholder="Email" required>
        <input type="text" class="form-control mb-2" name="phone" placeholder="Phone" required>
        <textarea name="address" class="form-control mb-2" placeholder="Address" required></textarea>
        <input type="text" class="form-control mb-2" name="password" placeholder="Password" requied>
   
        <button class="btn btn-success w-100 mb-2">Register</button>
        <a href="index.php">Login</a>
   
    </form>
   </div>
</body>
</html>