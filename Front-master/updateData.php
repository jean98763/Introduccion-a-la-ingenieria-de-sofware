<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "mavi_occidente");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$id = $mysqli->real_escape_string($_REQUEST['id_contacto']);
$nombre = $mysqli->real_escape_string($_REQUEST['nombre_update']);
$telefono = $mysqli->real_escape_string($_REQUEST['telefono_update']);
$tipo_telefono = $mysqli->real_escape_string($_REQUEST['tipo_telefono_update']);
$nota = $mysqli->real_escape_string($_REQUEST['nota_update']);
 
// Attempt insert query execution
$sql = "UPDATE ContactosMavi SET nombre = '".$nombre."', telefono = '".$telefono."', tipo_telefono = '".$tipo_telefono."', nota = '".$nota."' WHERE id =".$id;
if($mysqli->query($sql) === true){
    $data = array(
        'status' => 'success',
        'message' => 'Registro modificado correctamente'
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