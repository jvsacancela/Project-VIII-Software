<?php 

require_once '../data/sql.php';
require_once '../data/conexion.php';
$Object = new DateTime();  
$Object->setTimezone(new DateTimeZone('America/Bogota'));
$DateAndTime = $Object->format("d/m/Y");
//$a=$_POST['notificacion'];
$a="recordatorio";
if($a=="recordatorio"){
echo $DateAndTime;

}

?>