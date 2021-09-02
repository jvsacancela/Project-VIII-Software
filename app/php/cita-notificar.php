<?php 

require_once '../data/sql.php';
require_once '../data/conexion.php';
$clase_corr = new sql();

date_default_timezone_set("America/Lima"); 

echo $date_now = date('Y-m-d');
$date_future = strtotime('+1 day', strtotime($date_now));
echo $date_future = date('Y-m-d', $date_future);
$date_past = strtotime('-1 day', strtotime($date_now));
echo $date_past = date('Y-m-d', $date_past);

$a=$_POST['notificacion'];
//$a="recordatorio";
//envio de recordatorios
if($a=="recordatorio"){

        $result_cor = $clase_corr->ConsultaCorreos($date_now,$date_future);
        $game=array();
        while($row = $result_cor->fetch_assoc()){ 
            $temp= array();
            $temp['nombre'] = $row['NOMBRE_PA'];
            $temp['procedimientos'] = $row['PROCEDIMIENTOS'];
            $temp['detalle'] = $row['DETALLE_PRO'];
            $temp['fecha'] = $row['FECHA'];
            $temp['email'] = $row['CT_EMAIL'];
            $temp['hora'] = $row['HORA'];
            $temp['cor'] = $row['CT_FONO'];
            $game[]=$temp;
        }  
        $asunto="Recordatorio de cita IESS";
        foreach ($game as $val) {
            echo $corr= $val['email'];
            $hora= substr($val['hora'],0,-3);

           echo $msg =$val['nombre'] ." este es un mensaje de Recordatorio de su cita."."\n"."Informacion cita: "."\n"."Fecha: " .$val['fecha']."\n"."Hora: ".$hora."\n"."Procedimiento: ".$val['procedimientos']." ".$val['detalle']."\n"." Estar 20 minutos antes.";

          mail($corr,$asunto,$msg);  
        }
        $result_cor1 = $clase_corr->ConsultaCorreos1($date_past);

        if($result_cor1->num_rows>0){
            $game=array();
            while($row = $result_cor1->fetch_assoc()){ 
                $temp= array();
                $temp['codigo'] = $row['COD_CITA'];
                $temp['nombre'] = $row['NOMBRE_PA'];
                $temp['procedimientos'] = $row['PROCEDIMIENTOS'];
                $temp['detalle'] = $row['DETALLE_PRO'];
                $temp['fecha'] = $row['FECHA'];
                $temp['email'] = $row['CT_EMAIL'];
                $temp['hora'] = $row['HORA'];
                $temp['cor'] = $row['CT_FONO'];
                $game[]=$temp;
            }  
            $asunto="Expirado su cita IESS";
            foreach ($game as $val) {
                $cod=$val['codigo'];
                echo $corr= $val['email'];
                $hora= substr($val['hora'],0,-3);
    
               echo $msg =$val['nombre'] ." este es un mensaje de recordatorio que su cita a Expirado."."\n"."Informacion cita Expirada: "."\n"."Fecha: " .$val['fecha']."\n"."Hora: ".$hora."\n"."Procedimiento: ".$val['procedimientos']." ".$val['detalle']."\n"."Acercarse al area de imagenologia para reagendar su cita.";
               $result = $clase_corr->ActualizarEstado($cod);
               mail($corr,$asunto,$msg);
    
            }
        }

    }
    //Envio de Cancelacion
    if($a=="Cancelado"){
       echo $fechai=$_POST['fecha1'];
       echo $fechaf=$_POST['fecha2'];
       //echo $fechai= date('Y-m-d',$fechaaaai);;
       //echo $fechaf= date('Y-m-d',$fechaaaaf);;
        

        $mensaje=$_POST['mensaje'];
        $obs= "Reagendado por: ". $mensaje;
        $proce=$_POST['procedimiento'];
        $result_cor = $clase_corr->ConsultaCorreosCancelar($fechai,$fechaf,$proce);
       if($result_cor->num_rows>0){
            $game=array();
            while($row = $result_cor->fetch_assoc()){ 
                $temp= array();
                $temp['codigo'] = $row['COD_CITA'];
                $temp['cedulap'] = $row['CED_PA'];
                $temp['cedulau'] = $row['CED_USU'];
                $temp['cedulaf'] = $row['CED_FUN'];
                $temp['numh'] = $row['NUMERO_HISTORIA'];
                $temp['numo'] = $row['NUMERO_DE_ORDEN'];
                $temp['nomp'] = $row['NOMBRE_PA'];
                $temp['nomf'] = $row['NOMBRE_FUN'];
                $temp['procedimientos'] = $row['PROCEDIMIENTOS'];
                $temp['detalle'] = $row['DETALLE_PRO'];
                $temp['fecha'] = $row['FECHA'];
                $temp['hora'] = $row['HORA'];
                $temp['obs'] = $row['OBSERVACION'];
                $temp['email'] = $row['CT_EMAIL'];
                $temp['cor'] = $row['CT_FONO'];
                $temp['usu'] = $row['CT_USUARIO'];
                $game[]=$temp;
            }  
            $asunto="Cancelacion de cita IESS";
            foreach ($game as $val) {
                echo $corr= $val['email'];
                $cod=$val['codigo'];
                $hora= substr($val['hora'],0,-3);
    
               echo $msg =$val['nomp'] ." este es un mensaje De Cancelacion de su cita."."\n"."Informacion cita cancelada: "."\n"."Fecha: " .$val['fecha']."\n"."Hora: ".$hora."\n"."Procedimiento: ".$val['procedimientos']." ".$val['detalle']."\n"."Por motivo de: ".$mensaje;
               $result = $clase_corr->ActualizarEstadocancelado($cod,$mensaje);
              mail($corr,$asunto,$msg);

        }

       foreach ($game as $vall) {
           echo $pro=$vall['procedimientos'];
            echo $date_noww = date('Y-m-d');
            echo $hora_noww = date('H:i:s');
            $date_future = strtotime('+1 day', strtotime($date_noww));
            echo $date_future = date('Y-m-d', $date_future);

            $result_cor = $clase_corr->ConsultaCitaUltimo($pro);
            $result_time = $clase_corr->ConsultarProcedimientoTime($pro);
            //paa sacar fecha y tiempo
  
            if($result_cor->num_rows>0){
             $roww =mysqli_fetch_array($result_time);
            $tiempo = $roww['TIEMPO'];
            $row =mysqli_fetch_array($result_cor);
            echo $fecha_u = $row['FECHA'];
            echo $hora_u = $row['HORA'];
           
                if($fechaf==$fecha_u){
                    $fecha_ul= date($fecha_u);
                    $fecha_ult = strtotime('+1 day', strtotime($fecha_ul));
                    echo $fecha_ult = date('Y-m-d', $fecha_ult);
                    echo $fechaff=$fecha_ult." 06:00:00";                  
                    $fechaf= new DateTime($fechaff);
                    echo $fechaf->format('Y-m-d H:i:s' );

                }else{
                    echo $fechaff=$fecha_u." ".$hora_u;
                    $h= substr( $roww['TIEMPO'],0,-6);
                    $m= substr( $roww['TIEMPO'],3,-3);
                    echo $newtime= $h.'H'.$m.'M';
                    $intervalo = new DateInterval('PT'.$newtime); // intervalo de tiempo 19 horas y 30 min
                    $fechaf= new DateTime($fechaff);
        
                    $fechaf->add($intervalo);
                    echo $fechaf->format('Y-m-d H:i:s' );

                }
            }
            echo $abec=$fechaf->format('Y-m-d H:i:s');
            $tiempo_reagendar= substr($abec,11);
            $fecha_reagendar= substr($abec,0,-9);

            $cedula_paciente = $vall['cedulap'];
            $cedula_usuario=  $vall['cedulau'];
            $cedula_funcionario = $vall['cedulaf'];
            $numero_historia = $vall['numh'];
            $numero_orden = $vall['numo'];
            $nombre_paciente = $vall['nomp'];
            $nombre_funcionario = $vall['nomf'];
            $procedimiento = $vall['procedimientos'];
            $detalle = $vall['detalle'];
            $estado =  "Pendiente";
            $observacion = "Reagendado ";
            $ct_email = $vall['email'];
            $ct_fono = $vall['cor'];
            $ct_usuario = $vall['usu'];
            $fecha = $fecha_reagendar;
            $hora = $tiempo_reagendar;
            $asunto="Reagendamiento de cita IESS";
            echo $msg =$nombre_paciente ." este es un mensaje de Reagendamiento de su cita."."\n"."Informacion cita Reagendada : "."\n"."Fecha: " .$fecha."\n"."Hora: ".$hora."\n"."Procedimiento: ".$procedimiento." ".$detalle;
            mail($ct_email,$asunto,$msg);
            $insertar_cita = $clase_corr->AddCita($cedula_paciente, $cedula_usuario, $cedula_funcionario, $numero_historia, $numero_orden, $nombre_paciente, $nombre_funcionario, $procedimiento, $detalle, $estado, $observacion, $ct_email, $ct_fono, $ct_usuario, $fecha, $hora);
            
            
          }

        }else{
            echo "no hay registros";
        }


    }


    header ('Location: ../../view/pages/page-inicio.php');
   

?>