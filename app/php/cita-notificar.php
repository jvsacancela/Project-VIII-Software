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

           echo $msg =$val['nombre'] ." este es un mensaje de Recordatorio de su cita."."\n"."Informacion cita Expirada: "."\n"."Fecha: " .$val['fecha']."\n"."Hora: ".$hora."\n"."Procedimiento: ".$val['procedimientos']." ".$val['detalle']."\n"." Estar 20 minutos antes.";

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
        //$fechai=$_POST['fecha1'];
        //$fechaf=$_POST['fecha2'];
        $fechai= "2021-09-01";
        $fechaf= "2021-09-01";
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
            $pro=$vall['procedimientos'];
            echo $date_noww = date('Y-m-d');
            echo $hora_noww = date('H:i:s');
            $date_future = strtotime('+1 day', strtotime($date_noww));
            echo $date_future = date('Y-m-d', $date_future);

            $result_cor = $clase_corr->ConsultaCitaUltimo($pro);
            $result_time = $clase_corr->ConsultarProcedimientoTime($pro);
  
            if($result_cor->num_rows>0){
        /*$roww =mysqli_fetch_array($result_time);
            $tiempo = $roww['TIEMPO'];
            $row =mysqli_fetch_array($result_cor);
            $fecha_u = $row['FECHA'];
            $hora_u = $row['HORA'];*/
            $fechaf=$fecha_u." ".$hora_u;
            $h= substr( $roww['TIEMPO'],0,-6);
            $m= substr( $roww['TIEMPO'],3,-3);
            $newtime= $h.'H'.$m.'M';
            $intervalo = new DateInterval('PT'.$newtime); // intervalo de tiempo 19 horas y 30 min

            echo $fechaf->format('Y-m-d h:i:s');

            $fechaf->add($intervalo);
            echo $fechaf->format('Y-m-d h:i:s a');
            }else{
                echo "hoa";
            }
            if($result_time->num_rows>0){
                echo "esto si vale";
            }else{
                echo "hoa";
            }

           


           /* if($result_cor->num_rows>0){ 
                   
            $cedp= $vall['cedulap'];
            $cedu=$vall['cedulau'];
            $cedf=$vall['cedulaf'];
            $numh=$vall['numh'];
            $numo=$vall['numo'];
            $nomp=$vall['nomp'];
            $numf=$vall['nomf';
            $det=$vall['detalle'];
            $fe=$vall['fecha'];
            $ho=$vall['hora'];
            $obs=$vall['obs'];
            $email=$vall['email'];
            $cor=$vall['cor'];
            $insertar_procedimiento = $clase_corr->AddPacienteCancelado($procedimiento_id, $procedimiento_nombre, $procedimiento_hora);
           

            }*/

          }

        }else{
            echo "no hay registros";
        }


    }


    //header ('Location: ../../view/pages/page-inicio.php');
   

?>