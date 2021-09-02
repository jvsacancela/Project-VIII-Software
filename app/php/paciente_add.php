<?php 

    $insertar = new sql();

    if($_POST){

        $paciente_cedula = $_POST['paciente-cedula'];
        $consultar_paciente = $insertar-> ConsultarPacienteID($paciente_cedula);

        if($consultar_paciente->num_rows>0){
       
       ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <script>          
                Swal.fire({
                    icon: 'error',
                    title: 'Datos no almacenados',
                    text: 'Al parecer el paciente ingresado ya se encuentra registrado'
                })
            </script>

        <?php
           
            //require_once('mal.php');
        }else{ 
            $paciente_cedula = $_POST['paciente-cedula'];
            $paciente_hc = $_POST['paciente-hc'];
            $paciente_nombres = $_POST['paciente-nombres'];
            $paciente_afiliacion = $_POST['paciente-afiliacion'];
            $paciente_telefono = $_POST['paciente-telefono'];
            $paciente_direccion = $_POST['paciente-direccion'];
            $paciente_correo = $_POST['paciente-correo'];
    
    
            $insertar_paciente = $insertar->AddPaciente($paciente_cedula, $paciente_hc, $paciente_nombres, $paciente_afiliacion, $paciente_telefono, $paciente_direccion, $paciente_correo);

            ?>
    
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                <script> 
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Paciente agregado correctamente',
                    showConfirmButton: false,
                    timer: 1500
                })
                </script>
          <?php
    
           // header ('Location: ../../view/pages/page-pacientes.php');
        } 
    }?>



    