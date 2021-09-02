<?php 

require_once "../../../app/data/conexion.php";
require_once "../../../app/data/sql.php";

$consulta = new sql();

date_default_timezone_set('America/Lima');
$fecha_hoy = date("Y-m-d");
$fecha_inicial=$_POST['fecha1'];
$fecha_final=$_POST['fecha2'];
$procedimiento=$_POST['procedimiento'];
$estado=$_POST['estado'];

if(!empty($_POST['fecha1']) && !empty($_POST['fecha2']) && !empty($_POST['procedimiento']) && !empty($_POST['estado'])){
$resutado=$consulta->ConsultarReporte1($fecha_inicial,$fecha_final,$procedimiento,$estado);
}
if(!empty($_POST['fecha1']) && !empty($_POST['fecha2']) && empty($_POST['procedimiento']) && empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte2($fecha_inicial,$fecha_final);

}
if(empty($_POST['fecha1']) && empty($_POST['fecha2']) && !empty($_POST['procedimiento']) && empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte3($procedimiento);

}
if(empty($_POST['fecha1']) && empty($_POST['fecha2']) && empty($_POST['procedimiento']) && !empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte4($estado);

}
if(!empty($_POST['fecha1']) && !empty($_POST['fecha2']) && !empty($_POST['procedimiento']) && empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte5($fecha_inicial,$fecha_final,$procedimiento);

}
if(!empty($_POST['fecha1']) && !empty($_POST['fecha2']) && empty($_POST['procedimiento']) && !empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte6($fecha_inicial,$fecha_final,$estado);

}
if(empty($_POST['fecha1']) && empty($_POST['fecha2']) && !empty($_POST['procedimiento']) && !empty($_POST['estado'])){
    $resutado=$consulta->ConsultarReporte7($procedimiento,$estado);

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
        <div>REPORTE EMITIDO POR: <span>PONER NOMBRE</span> </div>
        <div>TIPO DE FILTRO:<span></span></div>
        <div>FECHA DE EMISION :<span></span></div>
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