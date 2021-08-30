<?php 

require_once '../data/sql.php';
require_once '../data/conexion.php';

$delete = new sql();

$id = $_GET['FUN_CED'];

$delete_funcionario = $delete-> DeleteFuncionario($id);

header ('Location: ../../view/pages/page-funcionarios.php');

?>
