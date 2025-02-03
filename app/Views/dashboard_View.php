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
<div class="row">
        <div class="col-xl-6">
        <a href="<?= base_url('users/save') ?>" class="btn btn-primary mb-3">Create user</a>
        </div>
        <div class="col-xl-6">
        <a href="<?= base_url('logout') ?>" class="btn btn-danger mb-3" style="left=90%">Close session</a>
        </div>
</div>
    <br>
    <input type="text" name="ask" id="whName" placeholder="Name">
    <!-- <button class="btn btn-secondary" id="btnName">Search</button> -->
    &nbsp;
    <input type="text" name="ask" id="whEmail" placeholder="Email">
    <!-- <button class="btn btn-secondary" id="btnEmail">Search</button> -->
    &nbsp;
    <input type="text" name="ask" id="whPassword" placeholder="Password">
    <!-- <button class="btn btn-secondary" id="btnPassword">Search</button> -->
    &nbsp;
    <select  id="whRole">
        <option value="admin">
            Administrator
        </option>
        <option value="mod">
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
    <input type="date" name="ask" id="whCreated_at" placeholder="Created_at">
    <!-- <button class="btn btn-secondary" id="btnCreated_at">Use Filter</button>
    <button class="btn btn-danger" id="noCreated_at">Remove Filter</button> -->
    &nbsp;
    <select name="ask" id="whDeleted_at">
        <option value="notDeleted">
        Allowed
        </option>
        <option value="deleted">
        Deleted
        </option>
        <option value="all" selected>
        All
        </option>
    </select>
    <!-- <button class="btn btn-secondary" id="btnDeleted_at">Search</button> -->
    <a href="#" class="btn btn-secondary" id="btnUseFilter">Use Filter</a>
    <a href="#" class="btn btn-danger" id="btnNotFilter">Remove Filter</a>
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
                <?php foreach ($users as $user): ?>
                    <tr>
                        <!-- <td>< ?= esc($user['id']) ?></td> -->
                        <td><?= esc($user['name']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= esc($user['password']) ?></td>
                        <td><?= esc($user['role']) ?></td>
                        <td><?= esc($user['created_at'])?></td>
                        <td><?= esc($user['deleted_at'])?></td>
                        <td>
                            <a href="<?= base_url('users/save/' . $user['id']) ?>" class="btn btn-warning">Editar</a>
                            <a href="<?=base_url('users/delete/') . esc($user['id']) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('¿Estás seguro de eliminar este usuario?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No hay usuarios registrados.</p>
    <?php endif; ?>
</div>
</body>
</html>