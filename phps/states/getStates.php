<?php
session_start();
//require "control_sesion.php"; //importa el control de sesiones el require detecta errores Fatales en la ejecución del archivo importado no así el include!
include "../database_connection.php";

/*********Eliminar estando producción************/
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set("display_errors", 1);
/*************************************************/

$id_workflow=$_REQUEST["id_workflow"];

$conn = obtener_coneccion();
$result = ejecutar_query($conn, "SELECT * FROM states WHERE id_workflow = '$id_workflow'");
$arr = pg_fetch_all($result);
print(json_encode($arr));
pg_close($conn);
?>