<?php
session_start();
include 'includes/database.php';

$error();

if ($_SERVER['REQUEST_METHOD']=='POST'){
    $usuario = $_POST['usuario'];
    $pasword = $_POST['pasword'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>
<body>
    <div class= "container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center">Iniciar Sesion</h3>
                        <form method="POST">
                            <div class="nb-3">
                                <label class ="form-label ">Usuario</label>
                                <input type="text" class="form-control" name="usuario" required>
                            </div>

                            <div class="nb-3">
                                <label class ="form-label ">Contraseña</label>
                                <input type="password" class="form-control" name="contrasena" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary mt-3">Iniciar Sesion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include 'includes/footer.php';    
    ?>
</body>
</html>