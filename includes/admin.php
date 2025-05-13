<?php
session_start(); 
include 'includes/header.php';

$password_correcto = 'admin123';

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['password'] == $password_correcto){
    
}
?>