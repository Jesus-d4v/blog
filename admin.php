<?php

session_start(); 
include 'includes/database.php';

$password_correcto = 'admin123';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['password']) && $_POST['password'] == $password_correcto){
    $_SESSION['inicio'] = true;
    
}
//cuando no hay sesion iniciada
if(!isset($_SESSION['inicio'])){
    ?>
    <h2 class="text-center mt-5">Acceso al Administrador</h2>  
    <form action = "admin.php" method="post" class= "container mt-5" style="max-width: 400px ;">
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña del administrador</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Acceder</button>
    </form>
    <?php
    exit(); 
}
//Si esta autenticado; mostrar el formularo de creacion
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['titulo'])){
    $titulo = $_POST['titulo'];
    $Contenido = $_POST['contenido'];

    if (isset($conn)) {
        $stmt = $conn->prepare("INSERT INTO publicaciones (Titulo, Contenido) VALUES (?, ?)");
    } else {
        die("<div class='alert alert-danger'>Error: No se pudo conectar a la base de datos.</div>");
    }
    $stmt->bind_param("ss", $titulo, $Contenido);
    if($stmt-> execute()){
        $mensaje="<div class='alert alert-success'>publicacion creada</div>";
    }else{
        $mensaje="<div class='alert alert-danger'>Error al crear la publicacion</div>";
    }
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header.php'; ?>
</head>
<body>
    <div class="container mt-4">
        <h2>Crear Nueva Publicacion</h2>
        <?php if(isset($mensaje)) echo $mensaje; ?>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contenido</label>
                <textarea class="form-control" name="contenido" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Publicar</button>
        </form>
    </div>
</body>
</html>
