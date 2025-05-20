<?php 
include 'includes/header.php'; 
include 'includes/database.php';?>
<?php
//consulta para obtener las publicaciones
$query = "SELECT * FROM publicaciones ORDER BY Fecha DESC";  
$result = $conn->query($query);

if ($result->num_rows > 0)
{
    //recorrer el resultado de la consulta
    //agregar columnas de dos
    echo '<div class="row">';

    while($row = $result->fetch_assoc()){
        echo '<div class="col-md-6 mb-4">';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row['Titulo'].'</h5>';
        echo '<p class="card-text">'.substr($row['Contenido'],0,150).'......</p>';
        echo '<small class="text-muted">Publicado el '.$row['Fecha'].'</small>';
        echo'<div class= "card-footer bg-transparent">';
        echo '<a href="post.php? id='.$row['id_publicaciones'].'" class="btn btn-sm btn-primary float-end">Ver más</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
       
    }echo '</div>';
} else {
    echo '<p class="text-muted">No hay publicaciones disponibles.</p>';   
}
$conn->close(); //cerrar la conexion a la base de datos
?>
