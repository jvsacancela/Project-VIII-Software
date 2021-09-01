<?php 

require_once "../../app/data/conexion.php";
require_once "../../app/data/sql.php";

$consulta = new sql();

$consulta_cita = $consulta->ConsultarCitas();
$consulta_procedimiento = $consulta->ConsultarProcedimientos()

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
          <h3 id="tit" class="fs-2 m-0">Inicio</h3>
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
                        <i class="fas fa-user me-2"></i>Usuario
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>

      </nav>

      <div class="container-fluid px-4">

        <div class="row my-5 col-md-12 m-auto shadow p-3 mb-5 bg-white rounded">
          <h3 class="fs-4 mb-3"><a href="" id="btnExport"><i class="icon ion-md-open"></i></a>Citas médicas</h3>
          <hr>

          <div>
            <div>
              <a class="col-sm-2" id="btnAdd" data-bs-toggle="modal" data-bs-target="#modal-cita-add"><i class="icon ion-md-calendar"></i>Nueva cita médica</a>
              <!--<i class="icon ion-md-pulse"></i>-->

              <?php include('screen/modal-cita-add.php')?>
            </div> 

            <div>
                <a class="col-sm-2" id="btnAdd" data-bs-toggle="modal" data-bs-target="#modal-cita-notificar"><i class="icon ion-md-notifications"></i>Notificar cita médica</a>
              <?php include('screen/modal-cita-notificar.php') ?>
</div> 
          </div>
          
          <hr>
        
          <div class="col" >
            <div class="table-responsive">
              <table class="table table-hover text-center" id="tabla">
                <div>
                    <br>      
                    <span>Fecha</span>
                    <span>Tipo</span>
                </div>               
                <thead> 
                    <th>...</th>
                    <th>Estado</th>
                    <th>Hora</th>
                    <th>Historia Clínica</th>
                    <th>Número de orden</th>
                    <th>Cédula del paciente</th>
                    <th>Nombre del paciente</th>
                    <th>Cédula del funcionario</th>
                    <th>Nombre del funcionario</th>
                    <th>Procedimiento</th>
                    <th>Observación</th>
                </thead>

                <tbody>
                <?php while($display = $consulta_cita->fetch_assoc()){ ?>
                  <tr class="text-uppercase">
                    <td>
                    <a  data-bs-toggle="modal" data-bs-target="#modal-cita-edit<?php echo $display['COD_CITA']?>" id="btnEdit"><i class="icon ion-md-create"></i></a>

                    <a data-bs-toggle="modal" data-bs-target="#modal-cita-delete<?php echo $display['COD_CITA'] ?>"  id="btnDelete" ><i class="icon ion-md-trash"></i></a>
                    </td>
                    <td><?php echo $display['ESTADO']; ?></td>
                    <td><?php echo $display['HORA']; ?></td>
                    <td><?php echo $display['NUMERO_HISTORIA']; ?></td>
                    <td><?php echo $display['NUMERO_DE_ORDEN']; ?></td>
                    <td><?php echo $display['CED_PA']; ?></td>
                    <td><?php echo $display['NOMBRE_PA']; ?></td>
                    <td><?php echo $display['CED_FUN']; ?></td>
                    <td><?php echo $display['NOMBRE_FUN']; ?></td>
                    <td><?php echo $display['PROCEDIMIENTOS'] . " " . $display['DETALLE_PRO'] ?></td>
                    <td><?php echo $display['OBSERVACION']; ?></td>
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

</body>


</html>


