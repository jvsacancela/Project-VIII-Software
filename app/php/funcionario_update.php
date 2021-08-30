<?php 

    require_once '../data/sql.php';
    require_once '../data/conexion.php';

    $update = new sql();

            $funcionario_cedula = $_POST['funcionario-cedula'];
            $funcionario_procedimiento = $_POST['funcionario-procedimiento'];
            $funcionario_cargo = $_POST['funcionario-cargo'];
            $funcionario_nombres = $_POST['funcionario-nombres'];
            $funcionario_contacto = $_POST['funcionario-contacto'];
            $funcionario_correo = $_POST['funcionario-correo'];
    
    
            $update_funcionario = $update->UpdateFuncionario($funcionario_cedula, $funcionario_procedimiento, $funcionario_cargo, $funcionario_nombres, $funcionario_contacto, $funcionario_correo);
    
            header ('Location: ../../view/pages/page-funcionarios.php');
    
    ?>