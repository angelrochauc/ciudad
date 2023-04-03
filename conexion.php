<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "consulta";

// Crea una conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica si la conexión fue exitosa
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}