<?php 

    require_once '../data/sql.php';
    require_once '../data/conexion.php';

    $update = new sql();

     $paciente_cedula = $_POST['paciente-cedula'];
     $paciente_hc = $_POST['paciente-hc'];
     $paciente_nombres = $_POST['paciente-nombres'];
     $paciente_afiliacion = $_POST['paciente-afiliacion'];
     $paciente_telefono = $_POST['paciente-telefono'];
     $paciente_direccion = $_POST['paciente-direccion'];
     $paciente_correo = $_POST['paciente-correo']; 

     $update_pacientes = $update->UpdatePaciente($paciente_cedula, $paciente_hc, $paciente_nombres, $paciente_afiliacion, $paciente_telefono, $paciente_direccion, $paciente_correo); 

     header ('Location: ../../view/pages/page-pacientes.php');
    ?>