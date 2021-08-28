<?php 

require_once "../../app/data/conexion.php";
require_once "../../app/data/sql.php";

$consulta = new sql();

$consulta_pacientes = $consulta->ConsultarProcedimientos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/sidebar.css">
</head>
<body>
   
 <?php include ('../includes/sidebar.php')?>
  

    <!---Contenido-->
    
    <div id="contenido-page">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="icon ion-md-reorder" id="menu"></i>
          <h3 class="fs-2 m-0">Pacientes</h3>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle second-text fw-bold text-uppercase" href="#" id="navbarDropdown"
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


        <div class="row my-5 col-md-11 m-auto">
          <h3 class="fs-4 mb-3"><a href="" id="btnExport"><i class="icon ion-md-open"></i></a>Pacientes</h3>

          <div>
            <hr>
            <a class="col-sm-2" id="btnAdd" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="icon ion-md-pulse"></i>Nuevo paciente</a>
            <!--<input class="col-sm-4" type="text" value="Buscar">-->
            <br>
          </div> 

          <div class="col">
            <div class="table-responsive">
              <table class="table table-hover text-center">              
                <thead>
                    <th>...</th>
                    <th>Cédula</th>
                    <th>Historia clínica</th>
                    <th>Nombres completos</th>
                    <th>Número de orden</th>
                    <th>Afiliación</th>
                    <th>Contacto</th>
                    <th>Correo electronico</th>
                    <th>Dirección</th>
                </thead>

                <tbody>
                  <?php while($display = $consulta_pacientes->fetch_assoc()){ ?>
                  <tr>
                    <td>
                    <a  data-bs-toggle="modal" data-bs-target="#modal-edit-vehiculo<?php echo $display['VEHICULO_PLACA']?>" id="btnEdit"><i class="icon ion-md-create"></i></a>

                    <a data-bs-toggle="modal" data-bs-target="#modal-delete-vehiculo<?php echo $display['VEHICULO_PLACA']?>"  id="btnDelete" ><i class="icon ion-md-trash"></i></a>
                    </td>
                    <td>abc</td>
                    <td>abc</td>
                    <td>abc</td>
                    <td>abc</td>
                    <td>abc</td>
                    <td>abc</td>
                    <td>abc</td>
                    <td>abc</td>
                  </tr>
                  <?php } ?>
                    <!--
                      <?php 
                     # include('forms/modal-delete-vehiculo.php');
                      #include('forms/modal-edit-vehiculo.php');
                    ?>
                    -->
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>    
  </div>


<script src="../events/sidebar.js"></script>
</body>
</html>