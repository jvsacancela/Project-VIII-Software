<?php 

require_once "../../../app/data/conexion.php";
require_once "../../../app/data/sql.php";
$consulta = new sql();
$cod=$_GET['cod_cita'];
$consultacita=$consulta->ConsultarCitasCodigo($cod);
$row =mysqli_fetch_array($consultacita);
    $ced = $row['CED_PA'];
    $nom = $row['NOMBRE_PA'];
    $numh = $row['NUMERO_HISTORIA'];
    $pro = $row['PROCEDIMIENTOS'];
    $de = $row['DETALLE_PRO'];
    $fe= $row['FECHA'];
    $ho= $row['HORA'];
    $med=$row['NOMBRE_FUN'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/ticket.css">
</head>
<body>
  <div class="ticket">
      <div class="centrado">
         <img  src="img/iess.png" alt="Logotipo">
      </div>
      <hr>
      <h2>H. genral Santo Domingo IESS</h2>
      <h3>Servicio de Imagenologia-Sala imagenologia</h3>
      <hr>
      <h2> PACIENTE:</h2>
      <p> <?php echo $nom?></p>
      <h2> CEDULA: </h2>
      <p><?php echo $ced?></p>
      <h2> N.HISTORIA:</h2>
      <p> <?php echo $numh?></p>
      <h2> PROCEDIMIENTO:</h2>
      <p> <?php echo $pro." ".$de?></p>
      <h2> FECHA : </h2>
      <p><?php echo $fe?></p>
      <h2> HORA :</h2>
      <p> <?php echo $ho?></p>
      <h2> MEDICO :</h2>
      <p> <?php echo $med?></p>
      <hr>
      <h2>COMENTARIO: SE SOLICITA ESTUDIO </h2>
      <h2>*Presentarse 20 minutos antes de la cita*</h2>
      <hr>


  </div>
</body>

<script>
   window.print();

</script>
</html>