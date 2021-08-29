
<div class="modal fade" id="modal-cita-edit<?php echo $display['COD_CITA']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva cita médica</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="procedimiento_add.php" method="POST">
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationServer01">Cédula paciente</label>
                <input type="text"   class="form-control " id="validationServer01" required name="cliente-id" value="<?php echo $display['CED_PA']?>">
                <div class="valid-feedback">
                  Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Nombres del paciente</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cliente-nombre" value="<?php echo $display['NOMBRE_PA']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Cédula del funcionario</label>
                <input type="text" class="form-control" id="validationServer02" required name="cliente-nombre" value="<?php echo $display['CED_FUN']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Nombre del funcionario</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cliente-nombre" value="<?php echo $display['NOMBRE_FUN']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Historia clínica</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cliente-nombre" value="<?php echo $display['NUMERO_HISTORIA']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Número de orden</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cliente-nombre" value="<?php echo $display['NUMERO_DE_ORDEN']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              
              <div class="col-md-12 mb-3">
                <label for="validationServer02">Procedimiento</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cliente-nombre" value="<?php echo $display['PROCEDIMIENTOS']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Detalle</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cliente-nombre" value="<?php echo $display['DETALLE_PRO']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Fecha</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cliente-nombre" value="<?php echo $display['FECHA']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Hora</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cliente-nombre" value="<?php echo $display['HORA']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Estado</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cliente-nombre" value="<?php echo $display['ESTADO']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Observación</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cliente-nombre" value="<?php echo $display['OBSERVACION']?>">
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