<?php 

require_once "../../app/data/conexion.php";
require_once "../../app/data/sql.php";

$consulta = new sql();

$consulta_funcionarios = $consulta->ConsultarFuncionarios();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procedimientos</title>
    <?php include ('../includes/links.php')?>
</head>
<body>
   
 <?php include ('../includes/sidebar.php')?>
  

    <!---Contenido-->
    
    <div id="contenido-page">
      <nav class="navbar navbar-expand-lg navbar-light  py-4 px-4 shadow p-3 mb-5 bg-white rounded">
        <div class="d-flex align-items-center">
          <i class="icon ion-md-reorder" id="menu"></i>
          <h3 id="tit" class="fs-2 m-0">Funcionarios</h3>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a id="tit" class="nav-link dropdown-toggle second-text fw-bold text-uppercase" href="#" id="navbarDropdown"
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
          <h3 class="fs-4 mb-3"><a href="" id="btnExport"><i class="icon ion-md-open"></i></a>Funcionarios</h3>

          <div>
            <hr>
            <a class="col-sm-2" id="btnAdd" data-bs-toggle="modal" data-bs-target="#modal-funcionario-add"><i class="icon ion-md-person"></i>Nuevo funcionario</a>
            <?php include('screen/modal-funcionario-add.php')?>
            <!--<input class="col-sm-4" type="text" value="Buscar">-->
          </div> 

          <hr>
          <div class="col">
            <div class="table-responsive">
            <br>
              <table class="table table-hover text-center" id="tabla">              
                <thead>
                    <th>...</th>
                    <th>Cédula</th>
                    <th>Procedimiento</th>
                    <th>Cargo</th>
                    <th>Nombres completos</th>
                    <th>Contacto</th>
                    <th>Correo electronico</th>
                </thead>

                <tbody>
                <?php while($display = $consulta_funcionarios->fetch_assoc()){ ?>
                  <tr class="text-uppercase">
                    <td>
                    <a  data-bs-toggle="modal" data-bs-target="#modal-funcionario-edit<?php echo $display['CED_FUN']?>" id="btnEdit"><i class="icon ion-md-create"></i></a>

                    <a data-bs-toggle="modal" data-bs-target="#modal-funcionario-delete<?php echo $display['CED_FUN'] ?>"  id="btnDelete" ><i class="icon ion-md-trash"></i></a>
                    </td>
                    <td><?php echo $display['CED_FUN'];?></td>
                    <td><?php echo $display['NOMBRE_PROCE'];?></td>
                    <td><?php echo $display['NOMBRE_CARGO'];?></td>
                    <td><?php echo $display['NOMBRE_COMPLETOS'];?></td>
                    <td><?php echo $display['CELULAR'];?></td>
                    <td><?php echo $display['CORREO'];?></td>
                  </tr>
                  <?php 
                      include('screen/modal-funcionario-delete.php');
                      include('screen/modal-funcionario-edit.php');
                      
                   } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>    
  </div>


  <?php include ('../includes/scripts.php')?>
</body>
</html>