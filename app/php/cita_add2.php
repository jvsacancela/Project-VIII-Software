<?php 

    require_once '../data/sql.php';
    require_once '../data/conexion.php';

    $insertar = new sql();

/*
    $cedula_usuario= "rr";
    #$cedula_funcionario = ;
    #$nombre_funcionario = ;
    $fecha = "rr";
    $hora = "rr";
    $estado = "rr";
    $ct_email = "rr";
    $ct_fono = "rr";
    $ct_usuario = "rr";

    $cedula_paciente = $_POST['paciente-cedula'];
    $numero_historia = $_POST['cita-hc'];
    $numero_orden = $_POST['cita-orden'];
    $nombre_paciente = $_POST['paciente-nombre'];

    #consulta de funcionario por cada procedimiento
    $procedimiento = $_POST['cita-procedimiento'];

    #$consultar_funcionario = $insertar-> ConsultarProcedimientoFuncionario($procedimiento);
    #if($consultar_funcionario == $procedimiento){
        $cedula_funcionario = "ABC";
        $nombre_funcionario = "ABC";
     #}
    $detalle = $_POST['cita-detalle'];
    $observacion = $_POST['cita-observacion'];

*/
<?php 

    require_once '../data/sql.php';
    require_once '../data/conexion.php';

    $insertar = new sql();

    $cedula_paciente = $_POST['paciente-cedula'];
    $cedula_usuario= "1234567890";
    $cedula_funcionario = "11";
    $numero_historia = $_POST['cita-hc'];
    $numero_orden = $_POST['cita-orden'];
    $nombre_paciente = $_POST['paciente-nombre'];
    $nombre_funcionario = "DEL CODIGO";
    $procedimiento = $_POST['cita-procedimiento'];
    $detalle = $_POST['cita-detalle'];
    $estado = "PENDIENTE";
    $observacion = $_POST['cita-observacion'];
    $ct_email = "DEL CODIGO";
    $ct_fono = "DEL CODIGO";
    $ct_usuario = "DEL CODIGO";
    $fecha = "2021-09-09";
    $hora = "21:00:00";

    
    $insertar_cita = $insertar->AddCita($cedula_paciente, $cedula_usuario, $cedula_funcionario, $numero_historia, $numero_orden, $nombre_paciente, $nombre_funcionario, $procedimiento, $detalle, $estado, $observacion, $ct_email, $ct_fono, $ct_usuario, $fecha, $hora);
    
    header ('Location: ../../view/pages/page-inicio.php');
    
    ?>

    
    
    /*
    $cedula_paciente = $_POST['paciente-cedula'];
    $cedula_usuario= ;
    $cedula_funcionario = ;
    $numero_historia = $_POST['cita-hc'];
    $numero_orden = $_POST['cita-orden'];
    $nombre_paciente = $_POST['paciente-nombre'];
    $nombre_funcionario = ;
    $procedimiento = $_POST['cita-procedimiento'];
    $detalle = $_POST['cita-detalle'];
    $fecha = ;
    $hora = ;
    $estado = ;
    $observacion = $_POST['cita-observacion'];
    $ct_email = ;
    $ct_fono = ;
    $ct_usuario = ;
    */

    
    ?>

    