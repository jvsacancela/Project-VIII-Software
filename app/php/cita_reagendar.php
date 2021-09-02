<?php 

    require_once '../data/sql.php';
    require_once '../data/conexion.php';

    $insertar = new sql();

    date_default_timezone_set("America/Lima"); 

    $cita_id = $_POST['id_cita'];
    $procedimiento = $_POST['cita-procedimiento'];
   
    $result_cor = $insertar-> ConsultaCitaUltimo($procedimiento);
    $result_time = $insertar->ConsultarProcedimientoTime($procedimiento);


    if($result_cor->num_rows>0){
        echo "si existe";
        
        $roww =mysqli_fetch_array($result_time);
        $tiempo = $roww['TIEMPO'];
        $row =mysqli_fetch_array($result_cor);
        echo $fecha_u = $row['FECHA'];
        echo $hora_u = $row['HORA'];

        echo $fechaff=$fecha_u." ".$hora_u;
        $h= substr( $roww['TIEMPO'],0,-6);
        $m= substr( $roww['TIEMPO'],3,-3);
        echo $newtime= $h.'H'.$m.'M';
        $intervalo = new DateInterval('PT'.$newtime); // intervalo de tiempo 19 horas y 30 min
        $fechaf= new DateTime($fechaff);

        $fechaf->add($intervalo);
        echo $fechaf->format('Y-m-d H:i:s' );

    }else{
        echo "no existe";

        $roww =mysqli_fetch_array($result_time);
        $tiempo = $roww['TIEMPO'];
        

        echo $date_noww = date('Y-m-d');
        $date_future = strtotime('+1 day', strtotime($date_noww));
        echo $date_future = date('Y-m-d', $date_future);

        echo $fechaff=$date_future." ". "06:00:00";
        $fechaf= new DateTime($fechaff);
        echo $fechaf->format('Y-m-d H:i:s' );

    }

    echo $abec=$fechaf->format('Y-m-d H:i:s');
    $tiempo_agendar= substr($abec,11);
    $fecha_agendar= substr($abec,0,-9);

    $cedula_paciente = $_POST['paciente-cedula'];
    $cedula_usuario= $_POST['usuario-cedula'];
    
    $numero_historia = $_POST['cita-hc'];
    $numero_orden = $_POST['cita-orden'];
    $nombre_paciente = $_POST['paciente-nombre'];
    
    
   
    $consulta_proce_name = $insertar->ConsultaFuncionarioProce($procedimiento)->fetch_assoc();
    $nombre_funcionario = $consulta_proce_name['NOMBRE_COMPLETOS'];
    $cedula_funcionario = $consulta_proce_name['CED_FUN'];


    $detalle = $_POST['cita-detalle'];
    $estado = "Pendiente";
    $observacion = "Reagendado";
    $ct_email = $_POST['cliente-correo'];
    $ct_fono = $_POST['cliente-telefono'];
    $ct_usuario = $_POST['usuario-nombre'];

    
    $fecha = $fecha_agendar;
    $hora = $tiempo_agendar;
    
    $update_cita = $insertar->UpdateCita($cita_id, $cedula_paciente, $cedula_usuario, $cedula_funcionario, $numero_historia, $numero_orden, $nombre_paciente, $nombre_funcionario, $procedimiento, $detalle, $estado, $observacion, $ct_email, $ct_fono, $ct_usuario, $fecha, $hora);
    
    //header ('Location: ../../view/pages/page-citas.php');
    
    ?>

    