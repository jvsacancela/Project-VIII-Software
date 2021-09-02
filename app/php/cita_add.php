<?php 

    require_once '../data/sql.php';
    require_once '../data/conexion.php';

    $insertar = new sql();

    $cedula_paciente = $_POST['paciente-cedula'];
    $cedula_usuario= "1234567890";
    
    $numero_historia = $_POST['cita-hc'];
    $numero_orden = $_POST['cita-orden'];
    $nombre_paciente = $_POST['paciente-nombre'];
    
    
    $procedimiento = $_POST['cita-procedimiento'];
    $consulta_proce_name = $insertar->ConsultaFuncionarioProce($procedimiento)->fetch_assoc();
    $nombre_funcionario = $consulta_proce_name['NOMBRE_COMPLETOS'];
    $cedula_funcionario = $consulta_proce_name['CED_FUN'];


    $detalle = $_POST['cita-detalle'];
    $estado = "Pendiente";
    $observacion = $_POST['cita-observacion'];
    $ct_email = $_POST['cliente-correo'];
    $ct_fono = $_POST['cliente-telefono'];
    $ct_usuario = "DEL CODIGO";
    $fecha = "2021-09-09";
    $hora = "21:00:00";

    
    $insertar_cita = $insertar->AddCita($cedula_paciente, $cedula_usuario, $cedula_funcionario, $numero_historia, $numero_orden, $nombre_paciente, $nombre_funcionario, $procedimiento, $detalle, $estado, $observacion, $ct_email, $ct_fono, $ct_usuario, $fecha, $hora);
    
    header ('Location: ../../view/pages/page-inicio.php');
    
    ?>

    