<?php 

session_start();
$ced_usu = $_SESSION['CED_USU'];

if(!isset($_SESSION['CED_USU'])){
  header ('Location: ../../index.php');
}


require_once "../../app/data/conexion.php";
require_once "../../app/data/sql.php";

$consulta = new sql();

$consulta_cita = $consulta->ConsultarCitas();
$consulta_procedimiento = $consulta->ConsultarProcedimientos();
$consulta_usu_name = $consulta->ConsultarNameUsu($ced_usu)->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php include ('../includes/links.php')?>

</head>
<body>
   
 <?php include ('../includes/sidebar.php')?>
  

    <!---Contenido-->
    
    <div id="contenido-page" >
      <nav class="navbar navbar-expand-lg navbar-light  py-4 px-4 shadow p-3 mb-5 bg-white rounded">
        <div class="d-flex align-items-center">
        <i class="icon ion-md-reorder" id="menu"></i>

          <h3 id="tit" class="fs-2 m-0">Citas médicas</h3>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a  id="tit" class="nav-link dropdown-toggle second-text fw-bold text-uppercase" href="#" id="navbarDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-2"></i><?php echo $consulta_usu_name['NOMBRE_COMPLETOS']?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../../app/php/cerrar_sesion.php">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>

      </nav>

      <div class="container-fluid px-4">

        <div class="row my-5 col-md-12 m-auto shadow p-3 mb-5 bg-white rounded">
          <h3 class="fs-4 mb-3"><a  data-bs-toggle="modal" data-bs-target="#modal-filtrar-reporte" id="btnEdit"> <i class="icon ion-md-open"></i></a>Citas médicas</h3>
          <?php include('screen/modal-filtrar-reporte.php');?>

          
          <hr>
        
          <div class="col" >
            <div class="table-responsive">
              <table class="table table-hover text-center" id="tabla">              
                <thead> 
                    <th>...</th>
                    <th>Estado</th>
                    <th>Hora y fecha</th>
                    <th>Historia Clínica</th>
                    <th>Número de orden</th>
                    <th>Cédula del paciente</th>
                    <th>Nombre del paciente</th>
                    <th>Nombre del funcionario</th>
                    <th>Procedimiento</th>
                    <th>Observación</th>
                </thead>

                <tbody>
                <?php while($display = $consulta_cita->fetch_assoc()){ ?>
                  <tr class="text-uppercase">
                    <td>
                    <a href="javascript:popUp('screen/ticket.php?cod_cita=<?php echo $display['COD_CITA']?>')"><i class="icon ion-md-print"></i></a>
                    
                    <a  data-bs-toggle="modal" data-bs-target="#modal-cita-edit<?php echo $display['COD_CITA']?>" id="btnEdit"><i class="icon ion-md-create"></i></a>

                    <a data-bs-toggle="modal" data-bs-target="#modal-cita-delete<?php echo $display['COD_CITA'] ?>"  id="btnDelete" ><i class="icon ion-md-trash"></i></a>
                    </td>
                    <td><b><?php echo $display['ESTADO']; ?></b></td>
                    <td><?php echo $display['HORA'] ." ". $display['FECHA']; ?></td>
                    <td><?php echo $display['NUMERO_HISTORIA']; ?></td>
                    <td><?php echo $display['NUMERO_DE_ORDEN']; ?></td>
                    <td><?php echo $display['CED_PA']; ?></td>
                    <td><?php echo $display['NOMBRE_PA']; ?></td>
                    <td><?php echo $display['NOMBRE_FUN']; ?></td>
                    <td><?php echo $display['PROCEDIMIENTOS'] . " " . $display['DETALLE_PRO'] ?></td>
                    <td><b><?php echo $display['OBSERVACION']; ?></b></td>
                  </tr>
                  <?php 
                      include('screen/modal-cita-delete.php');
                      include('screen/modal-cita-edit.php');
                      
                   } ?>
                  
                </tbody>
              </table>


            </div>
          </div>
        </div>
      </div>    
    </div>

 

  <?php include ('../includes/scripts.php')?>


  
  <script>
$(document).ready(function() {
  $('#notificacion').change(function(e) {
    if ($(this).val() === "recordatorio") {
      $('#a').prop("disabled", true);
      $('#b').prop("disabled", true);
      $('#c').prop("disabled", true);
      $('#d').prop("disabled", true);

    } else {
      $('#a').prop("disabled", false);
      $('#b').prop("disabled", false);
      $('#c').prop("disabled", false);
      $('#d').prop("disabled", false);

    }
  })
});
</script>
<script type="text/javascript">
    function popUp(URL) {
        window.open(URL, 'Imprimir ticket', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=800,height=800,left = 39,top = 50');
    }
    </script>

</body>


</html>


