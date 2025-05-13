<?php
session_start(); 
include 'includes/header.php';

$password_correcto = 'admin123';

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['password'] == $password_correcto){
    $_SESSION['inicio'] = true;
    header('Location: admin.php');
    exit();
}
if(!isset($_SESSION['inicio'])){
    ?>
    <form action = "admin.php" method="post" class= "container mt-5" style="max-width: 400px;">
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña del administrador</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Acceder</button>
    </form>
    <?php
}
?>