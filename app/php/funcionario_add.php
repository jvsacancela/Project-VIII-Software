<?php 

   // require_once '../data/sql.php';
    //require_once '../data/conexion.php';

    $insertar = new sql();

    if($_POST){

        $funcionario_cedula = $_POST['funcionario-cedula'];
        $consultar_funcionario = $insertar-> ConsultarFuncionarioID($funcionario_cedula);

        if($consultar_funcionario->num_rows>0){
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <script>          
                Swal.fire({
                    icon: 'error',
                    title: 'Datos no almacenados',
                    text: 'Al parecer el funcionario ingresado ya se encuentra registrado'
                })
            </script>

        <?php
        }else{ 
            $funcionario_cedula = $_POST['funcionario-cedula'];
            $funcionario_procedimiento = $_POST['funcionario-procedimiento'];
            $funcionario_cargo = $_POST['funcionario-cargo'];
            $funcionario_nombres = $_POST['funcionario-nombres'];
            $funcionario_contacto = $_POST['funcionario-contacto'];
            $funcionario_correo = $_POST['funcionario-correo'];
    
    
            $insertar_funcionario = $insertar->AddFuncionario($funcionario_cedula, $funcionario_procedimiento, $funcionario_cargo, $funcionario_nombres, $funcionario_contacto, $funcionario_correo);

            ?>
    
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                <script> 
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Funcionario agregado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                </script>
          <?php
    
           //header ('Location: ../../view/pages/page-funcionarios.php');
        }
        
        
    }?>