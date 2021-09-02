<?php 

   // require_once '../data/sql.php';
    //require_once '../data/conexion.php';

    $insertar = new sql();

    $contar_procedimiento = $insertar-> ContarProcedimientos()->fetch_assoc();
    echo $_contar_procedimiento = implode($contar_procedimiento);


    if($_POST){

        $procedimiento_nombre = $_POST['procedimiento-nombre'];
        $consulta_procedimiento = $insertar-> ConsultarProcedimientoName($procedimiento_nombre);

        if($consulta_procedimiento->num_rows>0){
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <script>          
                Swal.fire({
                    icon: 'error',
                    title: 'Datos no almacenados',
                    text: 'Al parecer el procedimiento ingresado se encuentra registrado'
                })
            </script>

        <?php
        }else{ 
            $procedimiento_nombre = $_POST['procedimiento-nombre'];
            $procedimiento_hora = $_POST['procedimiento-hora'];
            $procedimiento_id = $_contar_procedimiento + 1;
    
            $insertar_procedimiento = $insertar->AddProcedimiento($procedimiento_id, $procedimiento_nombre, $procedimiento_hora);
        ?>
    
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                <script> 
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Procedimiento agregado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                </script>
          <?php
    
           // header ('Location: ../../view/pages/page-procedimientos.php');
        } 
    
    }?>