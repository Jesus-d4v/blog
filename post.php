<?php
include 'includes/header.php';
include 'includes/database.php';

if(!isset($_GET['id'])){
    header("location: index.php");
    exit();
}
$id =$_GET['id'];
$query = "SELECT * FROM publicaciones WHERE id_publicaciones = ? ";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows == 0){
    echo "<div class='alert alert-warnig'>Publicacion no encontrada</div>";
    exit();
}

$publicacion = $result->fetch_assoc();
?>

<h2 class="text-center mt-4 mb-4"> <?php echo $publicacion['Titulo']; ?></h2>
<div class="card mb-4">
    <div class="card-body">
        <p class="card-text"><?php echo $publicacion['Contenido']; ?></p>
        <small class="text-muted">Publicado el <?php echo $publicacion['Fecha']; ?></small>
    </div>
</div>