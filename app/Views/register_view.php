<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
</head>
<body>
    <h1>Crear usuario</h1>
    <?php if(isset($validation)): ?>
        <div style="color:red;">
            <?=$validation->listErrors();?>
        </div>
    <?php endif;?>
    <form action="<?= base_url('home/create')?>" method="post">
        <?= csrf_field();?> <!-- protege el formulario contra CSRF -->

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="<?= set_value('name');?>"> 
        <br><br>
        <label for="name">Correo Electrónico:</label>
        <input type="email" name="email" id="email" value="<?= set_value('email');?>"> 
        <br><br>
        <button type="submit">Crear usuario</button>
    </form>
</body>
</html>