<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="view/styles/inicio.css">
</head>
<body>

    <div style="margin-top:150px" >
        <div class="card mb-3 m-auto shadow p-3 mb-5 bg-white rounded" style="max-width: 800px;">
    <div class="row g-0">
        <div class="col-md-4 m-auto">
            <img src="assets/img/IESS_Ecuador.png" class="img-fluid rounded-start" alt="iess_logo">
        </div>
        <div class="col-md-8">
        <div class="card-body">
            <h3 class="card-title" id="titulo">Iniciar sesión</h3>
            <hr>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Cedula</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  name="cedula">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="contrasena">
                </div>
                <hr>
                <div>
                    <button type="submit" class="btn col-md-4" id="btn">Ingresar</button>
                </div>
                
                </form>
            </div>
        </div>
    </div>
    </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>
</html>

<?php 

    session_start();
    
    require_once 'app/data/sql.php';
    require_once 'app/data/conexion.php';

    $consulta = new sql();


    if($_POST){

        $cedula = $_POST['cedula'];
        $contrasena = $_POST['contrasena'];

        $consulta_clave = $consulta->ConsultaUsuarioClave($cedula, $contrasena);

        if($consulta_clave->num_rows>0){
            // Sesiones
            $_SESSION['CED_USU'] = $cedula;
            $_SESSION['NOMBRE_COMPLETOS'];
            header('location: view/pages/page-inicio.php');
        }else{ 
            ?>
            <script>
                
                Swal.fire({
                    icon: 'error',
                    title: 'Acceso',
                    text: 'Datos incorrectos'

                })
            </script>
        <?php }
    }
?>