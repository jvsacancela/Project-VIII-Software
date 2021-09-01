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
        $fechai= "2021-08-31";
        $fechaf= "2021-08-31";
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
        /*foreach ($game as $vall) {
            $funcionario_cedula = $_POST['funcionario-cedula'];
            $funcionario_procedimiento = $_POST['funcionario-procedimiento'];
            $funcionario_cargo = $_POST['funcionario-cargo'];
            $funcionario_nombres = $_POST['funcionario-nombres'];
            $funcionario_contacto = $_POST['funcionario-contacto'];
            $funcionario_correo = $_POST['funcionario-correo'];

           
    }*/




        
        }else{
            echo "no hay registros";
        }


    }


    //header ('Location: ../../view/pages/page-inicio.php');
   

?>