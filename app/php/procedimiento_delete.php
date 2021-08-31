<?php 

require_once '../data/sql.php';
require_once '../data/conexion.php';

$delete = new sql();

$id = $_GET['NOMBRE_PROCE'];

$delete_procedimiento = $delete-> DeleteProcedimiento($id);

header ('Location: ../../view/pages/page-procedimientos.php');

?>
