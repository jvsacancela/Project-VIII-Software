<?php 

require_once '../data/sql.php';
require_once '../data/conexion.php';

$delete = new sql();

$id = $_GET['CED_PA'];

$delete_paciente = $delete-> DeletePaciente($id);

header ('Location: ../../view/pages/page-pacientes.php');

?>
