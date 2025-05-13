<?php 
include 'includes/header.php'; 
include 'includes/database.php';?>

<h2>Ultimas Publicaciones</h2>

<?php
//consulta para obtener las publicaciones
$query = "SELECT * FROM publicaciones ORDER BY Fecha DESC";  
$result = $conn->query($query);

if ($result->num_rows > 0)
{
    //recorrer el resultado de la consulta
    while($row = $result->fetch_assoc()){
        echo '<div class="card mb-3">';
        echo '<div class="card-body">';
        echo '<h5 class="card-titles">'.$row['Titulo'].'</h5>';
        echo '<p class= "card-text">'.substr($row['Contenido'],0,150).'......</p>';
        echo '<small class="text-muted">Publicado el '.$row['Fecha'].'</small>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<p class="text-muted">No hay publicaciones disponibles.</p>';   
}
$conn->close(); //cerrar la conexion a la base de datos
?>
