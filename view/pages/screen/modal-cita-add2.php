
<div class="modal fade" id="modal-cita-add<?php echo $display['CED_PA']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Citar paciente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../app/php/paciente_add.php" method="POST">
            <div class="form-row">

            <div class="col-md-12 mb-3">
                <label for="validationServer01">Cédula</label>
                <input type="text" maxlength="10" minlength="10"  class="form-control " id="validationServer01" required name="paciente-cedula">
                <div class="valid-feedback">
                  Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer01">Historia clínica</label>
                <input type="text"   class="form-control " id="validationServer01" required name="paciente-hc">
                <div class="valid-feedback">
                  Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Nombres completos</label>
                <input type="text" class="form-control" id="validationServer02" required name="paciente-nombres">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Afiliación</label>
                <input type="text" class="form-control" id="validationServer02"  required name="paciente-afiliacion">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Contacto</label>
                <input type="text" maxlength="10" minlength="10" class="form-control" id="validationServer02"  required name="paciente-telefono">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Correo electronico</label>
                <input type="text" class="form-control" id="validationServer02"  required name="paciente-correo">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Dirección de domicilio</label>
                <input type="text" class="form-control" id="validationServer02"  required name="paciente-direccion">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

                <div class="modal-footer">
                    <button class="btn col-md-12" type="submit">Guardar</button>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>