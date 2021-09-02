
<div class="modal fade" id="modal-paciente-edit<?php echo $display['CED_PA']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar paciente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../app/php/paciente_update.php" method="POST">
            <div class="form-row">

            <div class="col-md-12 mb-3">
                <label for="validationServer01">Cédula</label>
                <input type="text"   class="form-control " id="validationServer01" required name="paciente-cedula" value="<?php echo $display['CED_PA'] ?>">
                <div class="valid-feedback">
                  Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer01">Historia clínica</label>
                <input type="text"   class="form-control " id="validationServer01" required name="paciente-hc" value="<?php echo $display['NUMERO_HISTORIA'] ?>">
                <div class="valid-feedback">
                  Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Nombres completos</label>
                <input type="text" class="form-control" id="validationServer02" required name="paciente-nombres" value="<?php echo $display['NOMBRE_COMPLETOS'] ?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Afiliación</label>
                <input type="text" class="form-control" id="validationServer02"  required name="paciente-afiliacion" value="<?php echo $display['AFILIACION'] ?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Contacto</label>
                <input type="text" class="form-control" id="validationServer02"  required name="paciente-telefono" value="<?php echo $display['TELEFONO'] ?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Correo electronico</label>
                <input type="text" class="form-control" id="validationServer02"  required name="paciente-correo" value="<?php echo $display['EMAIL'] ?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Dirección de domicilio</label>
                <input type="text" class="form-control" id="validationServer02"  required name="paciente-direccion" value="<?php echo $display['DIRECCION'] ?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

                <div class="modal-footer">
                    <button class="btn col-md-12" type="submit">Actualizar</button>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>