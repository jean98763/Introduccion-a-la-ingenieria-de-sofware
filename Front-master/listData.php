<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "mavi_occidente");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Attempt insert query execution
$sql = "SELECT * FROM ContactosMavi";
if($result = $mysqli->query($sql)){

    if($result->num_rows > 0){
        while($row = $result->fetch_array()){
            $data[] = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'telefono' => $row['telefono'],
                'tipo_telefono' => $row['tipo_telefono'],
                'nota' => $row['nota']
            );
        }

        $data = array(
            'status' => 'success',
            'data' => $data
        );

        $result->free();
    }else{
        $data = array(
            'status' => 'error',
            'message' => 'No hay datos disponibles.'
        );
    }
    
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