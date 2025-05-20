<?php include 'includes/header.php'; ?>
<?php include 'includes/database.php'; ?>
<h2 class="mb-4">Contactos</h2>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['Nombre'];
    $email = $_POST['Email'];
    $mensaje = $_POST['Mensaje'];

    //validacion basica de php
    if(!empty($nombre)&& !empty($email)&& filter_var($email, FILTER_VALIDATE_EMAIL)){
        $stmt = $conn->prepare("INSERT INTO mensajes (Nombre, Email, Mensaje) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $email, $mensaje);
        
        if($stmt->execute()){
            echo '<div class="alert alert-success"> Mensaje enviado correctamente </div>';
        }else{
            echo '<div class="alert alert-danger"> Error al enviar el mensaje </div>';
        }
    }else{
        echo '<div class="alert alert-warning"> Primero ompleta todos los datos </div>';
    }
}
?>

<form action="contactos.php" method="post" onsubmit="return validarFormulario()">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="Nombre" id="nombre" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="Email" id="email" required>
    </div>

    <div class="mb-3">
        <label for="mensaje" class="form-label">Mensaje</label>
        <textarea class="form-control" name="Mensaje" id="mensaje" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Enviar</button>
</form>

<script src="assets/js/scripts.js"></script>
<?php include 'includes/footer.php';?>