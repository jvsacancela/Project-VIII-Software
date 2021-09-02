<?php

    $consulta_procedimiento = $consulta-> ConsultarProcedimientos();

?>

<div>
  
<div class="modal fade" id="modal-cita-edit<?php echo $display['COD_CITA']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar cita</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../app/php/cita_update.php" method="POST">
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationServer01">Cédula paciente</label>
                <input type="text" readonly  class="form-control " id="validationServer01" required name="paciente-cedula" value="<?php echo $display['CED_PA']?>">
                <div class="valid-feedback">
                  Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Nombres del paciente</label>
                <input type="text" readonly class="form-control" id="validationServer02"  required name="paciente-nombre" value="<?php echo $display['NOMBRE_PA']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>


              <div class="col-md-12 mb-3">
                <label for="validationServer02">Historia clínica</label>
                <input type="text" readonly  class="form-control" id="validationServer02"  required name="cita-hc" value="<?php echo $display['NUMERO_HISTORIA']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Número de orden</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cita-orden" value="<?php echo $display['NUMERO_DE_ORDEN']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              
              <div class="col-md-12 mb-3">
                <label for="validationServer02">Procedimiento</label>
                <select required name="cita-procedimiento" id="slcat1" class="form-control text-uppercase">
                <option readonly selected  value="<?php echo $display['PROCEDIMIENTOS']?>">
                <?php echo $display['PROCEDIMIENTOS']?></option>
                  <?php while($screen = $consulta_procedimiento->fetch_assoc()){?>
                    <option value="<?php echo $screen['NOMBRE_PROCE']?>">
                      <?php echo $screen['NOMBRE_PROCE']?>
                    </option>
                  <?php } ?>                                    
                </select>
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Diagnóstico</label>
                <input type="text" class="form-control" id="validationServer02"  required name="cita-detalle" value="<?php echo $display['DETALLE_PRO']?>">
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
              <input type="hidden" class="form-control" id="validationServer02" name="c_fecha" value="<?php echo $display['FECHA'] ?>">
                <input type="hidden" class="form-control" id="validationServer02" name="c_hora" value="<?php echo $display['HORA'] ?>">

                <input type="hidden" class="form-control" id="validationServer02" name="id_cita" value="<?php echo $display['COD_CITA'] ?>">

                <input type="hidden" class="form-control" id="validationServer02" name="cliente-correo" value="<?php echo $display['CT_EMAIL'] ?>">
                <input type="hidden" class="form-control" id="validationServer02" name="cliente-telefono" value="<?php echo $display['CT_FONO'] ?>">

                <input type="hidden" class="form-control" id="validationServer02" name="usuario-nombre" value="<?php echo $consulta_usu_name['NOMBRE_COMPLETOS'] ?>">
                <input type="hidden" class="form-control" id="validationServer02" name="usuario-cedula" value="<?php echo $consulta_usu_name['CED_USU'] ?>">

               
              </div>


                <div class="modal-footer">
                    <button class="btn col-md-12" type="submit">Actualizar</button>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>