<?php
    include("vendor/autoload.php");

    use Libs\Database\MySQL;
    use Libs\Database\UserTable;
    use Helpers\Auth;

    $auth=Auth::check();

    $table=new UserTable(new MySQL);
    $user=$table->getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <nav class="navbar navbar-dark bg-primary navbar-expand">
        <div class="container">
            <a href="#" class="navbar-brand">User Manager</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">
                        <b><?= $auth->name ?></b>
                    </a>
                    <li class="nav-item">
                         <a href="_actions/logout.php" class="nav-link">Logout</a>
                    </li>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <table class="table table-striped table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>

                <th>Action</th>
            </tr>

            <?php foreach($user as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phone ?></td>
                <!-- <td><?= $user->role ?></td> -->
                    <td>
                        <?php if($user->role_id==3): ?>
                            <span class="badge bg-success"><?= $user->role ?></span>
                        <?php elseif($user->role_id==2): ?>
                            <span class="badge bg-primary"><?= $user->role ?></span>
                        <?php else: ?>
                            <span class="badge bg-info"><?= $user->role ?></span>
                        <?php endif ?>
                     </td>
                    <td>
                        <div class="btn-group dropdown">
                            <?php if($auth->role_id==3): ?>
                                <a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle"
                                data-bs-toggle="dropdown">Role</a>

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="_actions/role.php?role=1&id=<?= $user->id ?>"
                                     class="dropdown-item">User</a>
                                     <a href="_actions/role.php?role=2&id=<?= $user->id ?>"
                                      class="dropdown-item">Manager</a>
                                      <a href="_actions/role.php?role=3&id=<?= $user->id ?>" 
                                      class="dropdown-item">Admin</a>
                                </div>
                            <?php endif ?>

                            <?php if($auth->role_id>=2): ?>
                                <?php if($user->suspended): ?>
                                    <a href="_actions/unsuspended.php?id=<?= $user->id ?>"
                                    class="btn btn-sm btn-warning">Ban</a>
                                <?php else: ?>
                                     <a href="_actions/suspended.php?id=<?= $user->id ?>"
                                        class="btn btn-sm btn-outline-warning">Ban</a>
                                <?php endif ?>
                            <?php endif ?>
                            
                            <?php if($auth->role_id==3): ?>
                                <a href="_actions/delete.php?id=<?= $user->id ?>"
                                    class="btn btn-sm btn-outline-danger">Delete</a>
                            <?php endif ?>
                            
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>