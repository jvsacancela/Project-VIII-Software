<?php 

session_start();
$ced_usu = $_SESSION['CED_USU'];

if(!isset($_SESSION['CED_USU'])){
  header ('Location: ../../index.php');

}
?>
<?php 

require_once "../../../app/data/conexion.php";
require_once "../../../app/data/sql.php";

$consulta = new sql();
$consulta_usu_name = $consulta->ConsultarNameUsu($ced_usu)->fetch_assoc();

date_default_timezone_set('America/Lima');
$fecha_hoy= date("Y-m-d");
$fecha_inicial=$_POST['fecha1'];
$fecha_final=$_POST['fecha2'];
$procedimiento=$_POST['procedimiento'];
$estado=$_POST['estado'];

if(!empty($_POST['fecha1']) && !empty($_POST['fecha2']) && !empty($_POST['procedimiento']) && !empty($_POST['estado'])){
$resutado=$consulta->ConsultarReporte1($fecha_inicial,$fecha_final,$procedimiento,$estado);
$tipo_filtro="Fecha:".$fecha_inicial."-".$fecha_final." Procedimiento: ".$procedimiento." Estado: ".$estado;
}
if(!empty($_POST['fecha1']) && !empty($_POST['fecha2']) && empty($_POST['procedimiento']) && empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte2($fecha_inicial,$fecha_final);
    $tipo_filtro="Fecha:".$fecha_inicial."-".$fecha_final;

}
if(empty($_POST['fecha1']) && empty($_POST['fecha2']) && !empty($_POST['procedimiento']) && empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte3($procedimiento);
    $tipo_filtro=" Procedimiento: ".$procedimiento;

}
if(empty($_POST['fecha1']) && empty($_POST['fecha2']) && empty($_POST['procedimiento']) && !empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte4($estado);
    $tipo_filtro=" Estado: ".$estado;

}
if(!empty($_POST['fecha1']) && !empty($_POST['fecha2']) && !empty($_POST['procedimiento']) && empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte5($fecha_inicial,$fecha_final,$procedimiento);
    $tipo_filtro="Fecha:".$fecha_inicial."-".$fecha_final." Procedimiento: ".$procedimiento;

}
if(!empty($_POST['fecha1']) && !empty($_POST['fecha2']) && empty($_POST['procedimiento']) && !empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte6($fecha_inicial,$fecha_final,$estado);
    $tipo_filtro="Fecha:".$fecha_inicial."-".$fecha_final." Estado: ".$estado;

}
if(empty($_POST['fecha1']) && empty($_POST['fecha2']) && !empty($_POST['procedimiento']) && !empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte7($procedimiento,$estado);
    $tipo_filtro=" Procedimiento: ".$procedimiento." Estado: ".$estado;

}
if(empty($_POST['fecha1']) && empty($_POST['fecha2']) && empty($_POST['procedimiento']) && empty($_POST['estado'])){

  $resutado=$consulta->ConsultarReporte1($fecha_inicial,$fecha_final,$procedimiento,$estado);
  $tipo_filtro="No se ah seleccionado un filtro.";

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="../../styles/reporte.css">
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="img/iess.png">
      </div>
      <h1>REPORTE AREA DE IMAGENOLOGIA</h1>
      <div id="company" class="clearfix">
        <div>Hospital IESS Santo Domingo</div>
        <div>Av. Río Lelia, <br /> Santo Domingo</div>
        <div>(02) 373-0800</div>
      </div>
      <div id="project">
        <div>REPORTE EMITIDO POR: <span><?php echo $consulta_usu_name['NOMBRE_COMPLETOS']?></span> </div>
        <div>TIPO DE FILTRO:<span><?php echo $tipo_filtro;?></span></div>
        <div>FECHA DE EMISION :<span><?php echo $fecha_hoy; ?></span></div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th>CEDULA PACIENTE</th>
            <th>NOBRE PACIENTE</th>
            <th>USUARIO</th>
            <th>FUNCIONARIO</th>
            <th>PROCEDIMIENTO</th>
            <th>FECHA</th>
            <th>ESTADO</th>
          </tr>
        </thead>
        <tbody>
        <?php while($display = $resutado->fetch_assoc()){ ?>

          <tr>
            <td ><?php echo $display['CED_PA']; ?></td>
            <td ><?php echo $display['NOMBRE_PA']; ?></td>
            <td ><?php echo $display['CT_USUARIO']; ?></td>
            <td ><?php echo $display['NOMBRE_FUN']; ?></td>
            <td ><?php echo $display['PROCEDIMIENTOS']; ?></td>
            <td ><?php echo $display['FECHA']; ?></td>
            <td ><?php echo $display['ESTADO']; ?></td>
    
          </tr>
          <?php     }    ?>

        </tbody>
      </table>
      <div id="notices">
        <div class="notice">Resultados obtenidos desde base de datos datos reales. Derechos reservados</div>
      </div>
    </main>
    <footer>
        Creado por VIII software 2021. Uniandes
    </footer>
  </body>
  <script>
   window.print();

</script>
</html>