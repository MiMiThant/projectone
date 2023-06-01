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
   <h3>Login Form</h3>
   
    <?php if(isset($_GET['incorrect'])): ?>
        <div class="alert alert-warning">
            Incorrect email or password!
        </div>
   <?php endif ?>
   <?php if(isset($_GET['register'])): ?>
        <div class="alert alert-info">
            Account created. Please login
        </div>
   <?php endif ?>

   <?php if(isset($_GET['suspended'])): ?>
        <div class="alert alert-danger">
            Account Suspended
        </div>
   <?php endif ?>

   <form action="_actions/login.php" method="post">
        <input class="form-control mb-3"  type="email" name="email" placeholder="Email" required>
        <input class="form-control mb-3" type="password" name="password" placeholder="password" required>
        <button type="submit" class="w-100 btn btn-success btn-lg">Login</button>
   </form>
   <br>
   <a href="register.php">Register</a>
   </div>
</body>
</html>