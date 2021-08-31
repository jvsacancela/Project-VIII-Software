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
$a="recordatorio";
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

           echo $msg =$val['nombre'] ." este es un mensaje de Recordatorio de su cita el dia " .$val['fecha']. " con la hora ".$hora." en su procedimiento ".$val['procedimientos']." ".$val['detalle']." estar 20 minutos antes.";

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
            $asunto="Su cita a caducado IESS";
            foreach ($game as $val) {
                $cod=$val['codigo'];
                echo $corr= $val['email'];
                $hora= substr($val['hora'],0,-3);
    
               echo $msg =$val['nombre'] ." este es un mensaje para recordarle que su cita del dia " .$val['fecha']. " con la hora ".$hora." en su procedimiento ".$val['procedimientos']." ".$val['detalle']." a Expirado acercarse al area de imagenologia para reagendar su cita.";
               $result = $clase_corr->ActualizarEstado($cod);
               mail($corr,$asunto,$msg);
    
            }
        }
        
        header ('Location: ../../view/pages/page-inicio.php');

       
        


    }

        

?>