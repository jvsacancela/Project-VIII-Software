<?php 

$consulta_procedimiento = $consulta-> ConsultarProcedimientos();
$cosnulta_cargo = $consulta-> ConsultarCargo();
?>
<div class="modal fade" id="modal-funcionario-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar funcionario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div class="form-row">

              <div class="col-md-12 mb-3">
                <label for="validationServer01">Cédula</label>
                <input type="text"   class="form-control text-uppercase" id="validationServer01" required name="funcionario-cedula">
                <div class="valid-feedback">
                  Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Procedimiento</label>
                <select required name="funcionario-procedimiento" id="slcat1" class="form-control text-uppercase">
                  <option selected disabled value="">-- SELECCIONAR PROCEDIMIENTO --</option>
                  <?php while($display = $consulta_procedimiento->fetch_assoc()){?>
                    <option value="<?php echo $display['NOMBRE_PROCE']?>">
                      <?php echo $display['NOMBRE_PROCE']?>
                    </option>
                  <?php } ?>                                    
                </select>
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Cargo</label>
                <select required name="funcionario-cargo" id="slcat1" class="form-control text-uppercase">
                  <option selected disabled value="">-- SELECCIONAR CARGO --</option>
                  <?php while($display = $cosnulta_cargo->fetch_assoc()){?>
                    <option value="<?php echo $display['NOMBRE_CARGO']?>">
                      <?php echo $display['NOMBRE_CARGO']?>
                    </option>
                  <?php } ?>                                    
                </select>
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Nombres completos</label>
                <input type="text" class="form-control text-uppercase" id="validationServer02"  required name="funcionario-nombres">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Contacto</label>
                <input type="text" class="form-control text-uppercase" id="validationServer02"  required name="funcionario-contacto">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Correo electrónico</label>
                <input type="text" class="form-control text-uppercase" id="validationServer02"  required name="funcionario-correo">
                <div class="valid-feedback" >
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