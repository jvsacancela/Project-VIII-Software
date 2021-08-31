<?php 

    require_once '../data/sql.php';
    require_once '../data/conexion.php';

    $update = new sql();


    $procedimiento_nombre = $_POST['procedimiento-nombre'];
    $procedimiento_hora = $_POST['procedimiento-hora'];

    $procedimiento_id = $_POST['procedimiento-id'];
    
    
    $update_procedimiento = $update->UpdateProcedimiento($procedimiento_id, $procedimiento_nombre, $procedimiento_hora);
    
    header ('Location: ../../view/pages/page-procedimientos.php');
    ?>