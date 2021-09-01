<?php 

    require_once '../data/sql.php';
    require_once '../data/conexion.php';

    $practica = new sql();

    $consulta_funcionario = $practica->ConsultarFuncionarios()->fetch_assoc();
    echo $consulta_funcionario['CED_FUN'];
    echo $consulta_funcionario['NOMBRE_COMPLETOS'];
    echo $name = $consulta_funcionario['NOMBRE_PROCE'].(1);

    $procedimiento = "RESONANCIA";
    
    if($procedimiento == $name){
       echo "bien";
    }else{
        echo "mal";
    }

    echo "<hr>";
    $consulta_proce_name = $practica->ConsultaFuncionarioProce($procedimiento);


    while($mostrar = $consulta_proce_name->fetch_assoc()){
        echo $mostrar['CED_FUN'];
        echo " ";
        echo $mostrar['NOMBRE_COMPLETOS'];
        echo "<br>";
    }

    echo "<hr>";

  
    $consulta_proce_name = $practica->ConsultaFuncionarioProce1($procedimiento)->fetch_assoc();

    echo $print = implode($consulta_proce_name);

        echo $consulta_proce_name['CED_FUN'];
        echo " ";
        echo $consulta_proce_name['NOMBRE_COMPLETOS'];


?>