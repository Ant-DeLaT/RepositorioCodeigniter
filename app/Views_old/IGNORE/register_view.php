<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Create account </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
<?php echo validation_errors();?>
    <h1 class="text-center">Register</h1>

    <!-- Mostrar errores de validación -->
    <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>

    <!-- Formulario -->
    <form action="<?= base_url('register/process')  ?>" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre"
                    required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                   required>
        </div>
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                    required>
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Repeat password</label>
            <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Repeat password"  
                    required>
        </div>
        <button type="submit" class="btn btn-success">Register</button>
        <a href="<?= base_url('login') ?>" class="btn btn-link">¿Already registered?</a>
        <a href="<?= base_url('users') ?>" class="btn btn-link">"Dashboard view"</a>
    </form>
</div>
</body>
</html>
