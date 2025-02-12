<?php
// require "conn.php";
// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//     $name=$_GET['whName']??"";
//     $email=$_GET['whEmail']??"";
//     $password=$_GET['whPassword']??"";
//     $role=$_GET['$whRole']??"";
//     $created_at=$_GET['whCreated_at']??"";
//     $isDeleted=$_GET['isDeleted']??"";
// }
//VARIABLES END




  
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listed Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<body>
<div class="container mt-5">
    <h1 class="text-center">User List</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success'); ?>');
        </script>
    <?php endif; ?>
    <div class="container">
        <div class="row">
                <div class="col-6">
                <a href="<?= base_url('users/save') ?>" class="btn btn-primary mb-3">Create user</a>
                </div>
                <div class="col-6">
                <a href="<?= base_url('logout') ?>" class="btn btn-danger mb-3 " >Close session</a>
                </div>
        </div>
    </div>
    <br>
    <!-- FORM -> GET -->
    <form method="GET" action="<?= base_url('users')?>" class="mb-3">

    <div class="container">
    <div class="input group w auto">
        <input type="text" name="ask" class="form-control" id="whName" placeholder="Name" value="<?= $name ?>">
        <!-- <button type="submit">SEARCH</button> -->
    
    <!-- <button class="btn btn-secondary" id="btnName">Search</button> -->
    &nbsp;
    <input type="text" name="ask" class="form-control" id="whEmail" placeholder="Email">
    <!-- <button class="btn btn-secondary" id="btnEmail">Search</button> -->
    &nbsp;
    <input type="text" name="ask" class="form-control" id="whPassword" placeholder="Password">
    <!-- <button class="btn btn-secondary" id="btnPassword">Search</button> -->
    &nbsp;
    <select class="form-control" id="whRole">
        <option value="admin">
            Administrator
        </option>
        <option value="moderator">
            Moderator
        </option>
        <option value="user">
            User
        </option>
        <option value="any" selected>
            Any
        </option>
    </select>
    <!-- <button class="btn btn-secondary" id="btnRole">Search</button> -->

    &nbsp;
    
        <input type="date" name="ask" class="form-control" id="whCreated_at" placeholder="Created_at">
        <!-- <button class="btn btn-secondary" id="btnCreated_at">Use Filter</button>
        <button class="btn btn-danger" id="noCreated_at">Remove Filter</button> -->
        &nbsp;
        <select name="ask" class="form-control" id="isDeleted">
   
        <option value="allowed">
        Allowed
        </option>
        <option value="deleted">
        Deleted
        </option>
        <option value="all" selected>
        All
        </option>
    </select>
    </div><br>
    <!-- <button class="btn btn-secondary" id="btnDeleted_at">Search</button> -->
    <div class="row">
        <div class="col"><button type="submit" class="btn btn-success" id="btnUseFilter">Use Filter</button></div>
        <div class="col"><a href="dashboard_View" class="btn btn-danger" id="btnNotFilter">Remove Filter</a></div>
    </div><br><br>
    </div>
    <!-- END FORM  -->



    <?php if (!empty($users) && is_array($users)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <!-- <th>ID</th> -->
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Created_at</th>
                    <th>Deleted_at</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user):?>
                    <tr>
                        <!-- <td>< ?= esc($user['id']) ?></td> -->
                        <td><?= esc($user['name']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= esc($user['password']) ?></td>
                        <td><?= esc($user['role']) ?></td>
                        <td><?= esc($user['created_at'])?></td>
                        <td><?= esc($user['deleted_at'])?></td>
                        <td>
                            <a href="<?= base_url('users/save/' . $user['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Insert value to change -->
                             
                            <?php if(esc($user['deleted_at'])==null): ?>
                                        <a href="<?= base_url("users/delete/") . esc($user["id"]) ?>" 
                                        class='btn btn-danger btn-sm'
                                        onclick='return confirm("Are you sure you want to delete this user?")'>Erase</a>
                                    <?php else:?>
                                     <a href="<?=base_url("users/restore/") . esc($user["id"])?>"
                                         class='btn btn-success btn-sm'
                                         onclick='return confirm("Do you really want to restore this user?")'>Restore</a>
                                 <?php endif?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="mt-4">
            <?= $pager->links("default","custom_pagination"); ?>
        </div>
    <?php else: ?>
        <p class="text-center">No hay usuarios registrados.</p>
    <?php endif; ?>
</div>

</body>
</html>