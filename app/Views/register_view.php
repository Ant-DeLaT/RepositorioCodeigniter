<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create user1</title>
</head>
<body>
    <h1>Create user</h1>
    <?php if(isset($validation)): ?>
        <div style="color:red;">
            <?=$validation->listErrors();?>
        </div>
    <?php endif;?>
    <form action="<?= base_url('home/create')?>" method="post">
        <?= csrf_field();?> <!-- protege el formulario contra CSRF -->

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= set_value('name');?>"> 
        <br><br>
        <label for="name">Electronic mail:</label>
        <input type="email" name="email" id="email" value="<?= set_value('email');?>"> 
        <br><br>
        <label for="name">Password:</label>
        <input type="text" name="name" id="name" value="<?= set_value('password');?>"> 
        <br><br>
        <button type="submit">Create user</button>
    </form>
</body>
</html>