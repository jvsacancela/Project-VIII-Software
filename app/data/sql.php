<?php 

    class sql{

        private $bd;

        public function __construct() {
            $this->bd = new mysqli(SERVIDOR, USUARIO, CLAVE, BDD);
            $this-> bd-> set_charset('utf8');
        }


        # Consultar funcionarios
        public function ConsultarFuncionarios(){
            $resultado = $this->bd->query("SELECT * FROM funcionarios_imagen ");
            return true;
        }

        # Agregar funcionarios
        public function AddFuncionarios(){
            $resultado = $this->bd->query("INSERT INTO");
            return true;
        }

        #Eliminar funcionarios
        #Update funcionarios

        #Consultar pacientes
        public function ConsultarPacientes(){
            $resultado = $this->bd->query("SELECT * FROM pacientes");
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

      
    }

?>