<?php 

$consulta_procedimiento = $consulta-> ConsultarProcedimientos();
$consulta_cargo = $consulta-> ConsultarCargo();
?>
<div class="modal fade" id="modal-funcionario-edit<?php echo $display['CED_FUN']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar funcionario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../app/php/funcionario_update.php" method="POST">
            <div class="form-row">

              <div class="col-md-12 mb-3">
                <label for="validationServer01">Cédula</label>
                <input type="text"   class="form-control text-uppercase" id="validationServer01" required value="<?php echo $display['CED_FUN'] ?>" name="funcionario-cedula">
                <div class="valid-feedback" >
                  Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Procedimiento</label>
                <select name="funcionario-procedimiento" id="slcat1" class="form-control">
                <option selected disabled value="<?php echo $display['NOMBRE_PROCE']?>">
                <?php echo $display['NOMBRE_PROCE']?></option>
                      <?php while($screen = $consulta_procedimiento->fetch_assoc()){?>
                          <option value="<?php echo $screen['NOMBRE_PROCE']?>"><?php echo $screen['NOMBRE_PROCE']?></option>
                      <?php } ?>                                    
                  </select> 
                <div class="valid-feedback" >
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Cargo</label>
                <select name="funcionario-cargo" id="slcat2" class="form-control">
                <option selected disabled value="<?php echo $display['NOMBRE_CARGO']?>">
                <?php echo $display['NOMBRE_CARGO']?></option>
                <?php while($screen = $consulta_cargo->fetch_assoc()){?>
                          <option value="<?php echo $screen['NOMBRE_CARGO']?>"><?php echo $screen['NOMBRE_CARGO']?></option>
                      <?php } ?>                                
                  </select> 
                <div class="valid-feedback" >
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Nombres completos</label>
                <input type="text" class="form-control text-uppercase" id="validationServer02"  required  value="<?php echo $display['NOMBRE_COMPLETOS'] ?>" name="funcionario-nombres">
                <div class="valid-feedback" >
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Contacto</label>
                <input type="text" class="form-control text-uppercase" id="validationServer02"  required  value="<?php echo $display['CELULAR'] ?>" name="funcionario-contacto">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Correo electrónico</label>
                <input type="text" class="form-control text-uppercase" id="validationServer02"  required  value="<?php echo $display['CORREO'] ?>" name="funcionario-correo">
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