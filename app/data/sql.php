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

        #Consultar funcionario por procedimiento id
        public function ConsultaFuncionarioProce($procedimiento_name){
            $resultado = $this->bd->query("SELECT CED_FUN, NOMBRE_COMPLETOS FROM FUNCIONARIOS_IMAGEN WHERE NOMBRE_PROCE = '$procedimiento_name' ORDER BY RAND() LIMIT 50");
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

        #Procedimiento Name
        public function ConsultarProcedimientoFuncionario($procedimiento_name){
            $resultado = $this->bd->query("SELECT * FROM FUNCIONARIOS_IMAGEN WHERE NOMBRE_PROCE = '$procedimiento_name'");
            return $resultado;
        }

         #Procedimiento Name
         public function ConsultarProcedimientoName($id){
            $resultado = $this->bd->query("SELECT * FROM PROCEDIMIENTO WHERE NOMBRE_PROCE = '$id'");
            return $resultado;
        }

        #Eliminar funcionarios
        public function DeleteFuncionario($funcionario_id){
            $resultado = $this->bd->query("DELETE FROM FUNCIONARIOS_IMAGEN WHERE CED_FUN = '$funcionario_id'");
            return true;
        }

        #Update funcionarios
        public function UpdateFuncionario($funcionario_cedula, $funcionario_procedimiento, $funcionario_cargo, $funcionario_nombres, $funcionario_contacto, $funcionario_correo){
            $resultado = $this->bd->query("UPDATE FUNCIONARIOS_IMAGEN SET CED_FUN='$funcionario_cedula', NOMBRE_PROCE='$funcionario_procedimiento', NOMBRE_CARGO='$funcionario_cargo', NOMBRE_COMPLETOS='$funcionario_nombres', CELULAR='$funcionario_contacto', CORREO='$funcionario_correo'
            WHERE CED_FUN='$funcionario_cedula'");
            return $resultado;
        }

        #Consultar pacientes
        public function ConsultarPacientes(){
            $resultado = $this->bd->query("SELECT * FROM PACIENTES");
            return $resultado;
        }

        #Add pacientes
        public function AddPaciente($paciente_cedula, $paciente_hc, $paciente_nombres, $paciente_afiliacion, $paciente_telefono, $paciente_direccion, $paciente_correo){
            $resultado = $this->bd->query("INSERT INTO PACIENTES(CED_PA, NUMERO_HISTORIA, NOMBRE_COMPLETOS, AFILIACION, TELEFONO, DIRECCION, EMAIL) VALUES ('$paciente_cedula', '$paciente_hc', '$paciente_nombres', '$paciente_afiliacion', '$paciente_telefono', '$paciente_direccion', '$paciente_correo')");
            return true;
        }

        #Eliminar pacientes
        public function DeletePaciente($paciente_id){
            $resultado = $this->bd->query("DELETE FROM PACIENTES WHERE CED_PA = '$paciente_id'");
            return true;
        }

        #Update pacientes
        public function UpdatePaciente($paciente_cedula, $paciente_hc, $paciente_nombres, $paciente_afiliacion, $paciente_telefono, $paciente_direccion, $paciente_correo){
            $resultado = $this->bd->query("UPDATE PACIENTES SET CED_PA='$paciente_cedula', NUMERO_HISTORIA='$paciente_hc', NOMBRE_COMPLETOS='$paciente_nombres', AFILIACION='$paciente_afiliacion', TELEFONO='$paciente_telefono', DIRECCION='$paciente_direccion' , EMAIL='$paciente_correo' 
            WHERE CED_PA = '$paciente_cedula'");
            return $resultado;
        }

        #Paciente ID
        public function ConsultarPacienteID($paciente_cedula){
            $resultado = $this->bd->query("SELECT * FROM PACIENTES WHERE CED_PA = '$paciente_cedula'");
            return $resultado;
        }

        #Consultar procedimientos
        public function ConsultarProcedimientos(){
            $resultado = $this->bd->query("SELECT * FROM PROCEDIMIENTO");
            return $resultado;
        }

        #Add procedimientos
        public function AddProcedimiento($procedimiento_id, $procedimiento_nombre, $procedimiento_hora){
            $resultado = $this->bd->query("INSERT INTO PROCEDIMIENTO(PROCE_ID, NOMBRE_PROCE, TIEMPO) VALUES ('$procedimiento_id','$procedimiento_nombre', '$procedimiento_hora')");
            return true;
        }

        #Contar Procedimiento
        public function ContarProcedimientos(){
            $resultado = $this->bd->query("SELECT COUNT(PROCE_ID) FROM PROCEDIMIENTO");
            return $resultado;
        }

        #Eliminar procedimientos
        public function DeleteProcedimiento($procedimiento_id){
            $resultado = $this->bd->query("DELETE FROM PROCEDIMIENTO WHERE NOMBRE_PROCE = '$procedimiento_id'");
            return true;
        }

        #Update procedimientos
        public function UpdateProcedimiento($procedimiento_id, $procedimiento_nombre, $procedimiento_hora){
            $resultado = $this->bd->query("UPDATE PROCEDIMIENTO SET NOMBRE_PROCE='$procedimiento_nombre', TIEMPO='$procedimiento_hora'
            WHERE PROCE_ID = '$procedimiento_id'");
            return $resultado;
        }

        #Agregar Cita
        public function AddCita($cedula_paciente, $cedula_usuario, $cedula_funcionario, $numero_historia, $numero_orden, $nombre_paciente, $nombre_funcionario, $procedimiento, $detalle, $estado, $observacion, $ct_email, $ct_fono, $ct_usuario, $fecha, $hora){
            $resultado = $this->bd->query("INSERT INTO CITA(CED_PA, CED_USU, CED_FUN, NUMERO_HISTORIA, NUMERO_DE_ORDEN, NOMBRE_PA, NOMBRE_FUN, PROCEDIMIENTOS, DETALLE_PRO, ESTADO, OBSERVACION, CT_EMAIL, CT_FONO, CT_USUARIO, FECHA, HORA) VALUES ('$cedula_paciente', '$cedula_usuario', '$cedula_funcionario', '$numero_historia', '$numero_orden', '$nombre_paciente', '$nombre_funcionario', '$procedimiento', '$detalle','$estado', '$observacion', '$ct_email', '$ct_fono', '$ct_usuario', '$fecha', '$hora')");
            return true;
        }

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
        
        #Consultar Correos
        public function ConsultaCorreos($date_now,$date_future){
            $resultado = $this->bd->query("SELECT * FROM CITA WHERE FECHA BETWEEN '$date_now' AND '$date_future'");
            return $resultado;
        }
        public function ConsultaCorreos1($date_past){
            $resultado = $this->bd->query("SELECT * FROM CITA WHERE FECHA='$date_past' AND ESTADO='Pendiente'");
            return $resultado;
        }
        public function ActualizarEstado($cod){
            $resultado = $this->bd->query("UPDATE CITA  set ESTADO='Expirado' WHERE COD_CITA = '$cod'");
            return true;
        }
        #Consulta correos cancelacion
        public function ConsultaCorreosCancelar($fechai,$fechaf,$proce){
            $resultado = $this->bd->query("SELECT * FROM CITA WHERE FECHA BETWEEN '$fechai' AND '$fechaf' AND ESTADO='Pendiente' AND PROCEDIMIENTOS='$proce'");
            return $resultado;
        }
        public function ActualizarEstadocancelado($cod,$obs){
            $resultado = $this->bd->query("UPDATE CITA  set ESTADO='Cancelado', OBSERVACION='$obs' WHERE COD_CITA = '$cod'");
            return true;

        }
        #Reagendar cita canceladas
        public function AddPacienteCancelado($procedimiento_id, $procedimiento_nombre, $procedimiento_hora){
            $resultado = $this->bd->query("INSERT INTO PROCEDIMIENTO(PROCE_ID, NOMBRE_PROCE, TIEMPO) VALUES ('$procedimiento_id','$procedimiento_nombre', '$procedimiento_hora')");
            return true;
        }
        public function ConsultaCitaUltimo($pro){
            $resultado = $this->bd->query("SELECT TOP 1 * FROM CITA ORDER BY COD_CITA DESC ");
            return $resultado;
        }
        #consultar procedimientos time
        #Procedimiento Name
        public function ConsultarProcedimientoTime($pro){
            $resultado = $this->bd->query("SELECT * FROM PROCEDIMIENTO WHERE NOMBRE_PROCE = '$pro'");
            return $resultado;
        }

      
    }

?>