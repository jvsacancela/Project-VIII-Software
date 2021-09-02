<div>


<div class="modal fade" id="modal-cita-reagendar<?php echo $display['COD_CITA'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reagendar cita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <span>¿Esta seguro de reagendar la cita del paciente </span>
        <span class="text-uppercase"><?php echo $display['NOMBRE_PA'] . "?"?></span>
      </div>

      <form action="../../app/php/cita_reagendar.php" method="POST">
            <div class="form-row">
               

              <div class="col-md-12 mb-3">

              <input type="hidden" readonly  class="form-control " id="validationServer01" required name="paciente-cedula" value="<?php echo $display['CED_PA']?>">

              <input type="hidden" readonly class="form-control" id="validationServer02"  required name="paciente-nombre" value="<?php echo $display['NOMBRE_PA']?>">

              <input type="hidden" readonly  class="form-control" id="validationServer02"  required name="cita-hc" value="<?php echo $display['NUMERO_HISTORIA']?>">

              <input type="hidden" class="form-control" id="validationServer02"  required name="cita-orden" value="<?php echo $display['NUMERO_DE_ORDEN']?>">

              <input type="hidden" class="form-control" id="validationServer02"  required name="cita-procedimiento" value="<?php echo $display['PROCEDIMIENTOS']?>"">

              <input type="hidden" class="form-control" id="validationServer02"  required name="cita-detalle" value="<?php echo $display['DETALLE_PRO']?>">

              <input type="hidden" class="form-control" id="validationServer02" name="c_fecha" value="<?php echo $display['FECHA'] ?>">
                <input type="hidden" class="form-control" id="validationServer02" name="c_hora" value="<?php echo $display['HORA'] ?>">

                <input type="hidden" class="form-control" id="validationServer02" name="id_cita" value="<?php echo $display['COD_CITA'] ?>">

                <input type="hidden" class="form-control" id="validationServer02" name="cliente-correo" value="<?php echo $display['CT_EMAIL'] ?>">
                <input type="hidden" class="form-control" id="validationServer02" name="cliente-telefono" value="<?php echo $display['CT_FONO'] ?>">

                <input type="hidden" class="form-control" id="validationServer02" name="usuario-nombre" value="<?php echo $consulta_usu_name['NOMBRE_COMPLETOS'] ?>">
                <input type="hidden" class="form-control" id="validationServer02" name="usuario-cedula" value="<?php echo $consulta_usu_name['CED_USU'] ?>">

               
              </div>


                <div class="modal-footer">
                    <button class="btn col-md-12" type="submit">Reagendar</button>
                </div>
        </form>

    </div>
  </div>
</div>
</div>