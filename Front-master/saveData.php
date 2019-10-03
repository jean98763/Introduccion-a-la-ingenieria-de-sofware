<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "mavi_occidente");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$nombre = $mysqli->real_escape_string($_REQUEST['nombre']);
$telefono = $mysqli->real_escape_string($_REQUEST['telefono']);
$tipo_telefono = $mysqli->real_escape_string($_REQUEST['tipo_telefono']);
$nota = $mysqli->real_escape_string($_REQUEST['nota']);
 
// Attempt insert query execution
$sql = "INSERT INTO ContactosMavi (nombre, telefono, tipo_telefono,nota) VALUES ('".$nombre."', '".$telefono."', '".$tipo_telefono."','".$nota."')";
if($mysqli->query($sql) === true){
    $data = array(
        'status' => 'success',
        'message' => 'Gracias por contactarnos'
    );
} else{
    $data = array(
        'status' => 'error',
        'message' => 'Intente de nuevo por favor.'
    );
}
 
$mysqli->close();
header('Content-Type: application/json');
echo json_encode($data);
// Close connection

?>