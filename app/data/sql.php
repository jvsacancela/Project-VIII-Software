<?php 

    class sql{

        private $bd;

        public function __construct() {
            $this->bd = new mysqli(SERVIDOR, USUARIO, CLAVE, BDD);
            $this-> bd-> set_charset('utf8');
        }


        # Consultar funcionarios
        public function ConsultarFuncionarios(){
            $resultado = $this->bd->query("SELECT * FROM FUNCIONARIOS_IMAGEN");
            return $resultado;
        }

        # Agregar funcionarios
        public function AddFuncionario($funcionario_cedula, $funcionario_procedimiento, $funcionario_cargo, $funcionario_nombres, $funcionario_contacto, $funcionario_correo){
            $resultado = $this->bd->query("INSERT INTO FUNCIONARIOS_IMAGEN(CED_FUN, NOMBRE_PROCE, NOMBRE_CARGO, NOMBRE_COMPLETOS, CELULAR, CORREO) VALUES ('$funcionario_cedula', '$funcionario_procedimiento', '$funcionario_cargo', '$funcionario_nombres', '$funcionario_contacto', '$funcionario_correo')");
            return true;
        }

        #Funcionario ID
        public function ConsultarFuncionarioID($funcionario_cedula){
            $resultado = $this->bd->query("SELECT * FROM FUNCIONARIOS_IMAGEN WHERE CED_FUN = '$funcionario_cedula'");
            return $resultado;
        }

        #Eliminar funcionarios
        public function DeleteFuncionario($funcionario_id){
            $resultado = $this->bd->query("DELETE FROM FUNCIONARIOS_IMAGEN WHERE CED_FUN = '$funcionario_id'");
            return true;
        }

        #Update funcionarios
        public function UpdateFuncionario($funcionario_cedula, $funcionario_procedimiento, $funcionario_cargo, $funcionario_nombres, $funcionario_contacto, $funcionario_correo){
            $resultado = $this->bd->query("UPDATE FUNCIONARIOS_IMAGEN SET CED_FUN='$funcionario_cedula', NOMBRE_PROCE='$funcionario_procedimiento', NOMBRE_CARGO='$funcionario_cargo', NOMBRE_COMPLETOS='$funcionario_nombres', CELULAR='$funcionario_contacto', CORREO='$funcionario_correo' WHERE CED_FUN='$funcionario_cedula'");
            return $resultado;
        }

        #Consultar pacientes
        public function ConsultarPacientes(){
            $resultado = $this->bd->query("SELECT * FROM PACIENTES");
            return $resultado;
        }

        #Add pacientes
        #Eliminar pacientes
        #Update pacientes

        #Consultar procedimientos
        public function ConsultarProcedimientos(){
            $resultado = $this->bd->query("SELECT * FROM PROCEDIMIENTO");
            return $resultado;
        }
        #Add procedimientos
        #Eliminar procedimientos
        #Update procedimientos

        #Consultar citas
        public function ConsultarCitas(){
            $resultado = $this->bd->query("SELECT * FROM CITA");
            return $resultado;
        }

        #Consultar cargos
        public function ConsultarCargo(){
            $resultado = $this->bd->query("SELECT * FROM CARGOS");
            return $resultado;
        }
      
    }

?>