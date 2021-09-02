
<div class="modal fade" id="modal-cita-notificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notificar citas médica</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../app/php/cita-notificar.php" method="POST">
            <div class="form-row">
              <div class="row col-md-12 mb-3">
                <div class="col-md-5 m-auto">
                <label for="validationServer01">Tipo de Notificacion</label>
                </div>
                <div class="col-md-7 ">
                <select  class="form-select" name="notificacion" id="notificacion">
                  <option value="recordatorio">Recordatorio de citas</option>
                  <option value="Cancelado">Cancelacion de citas</option>
                </select>
                </div>
              </div>
              <div class=" col-md-12 mb-3">
                <label for="validationServer01">Fecha Inicial</label>
                <input class="form-control" type="date" name="fecha1" disabled="disabled" id="a" ></input>
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>
              <div class=" col-md-12 mb-3">
                <label for="validationServer01">Fecha Final</label>
                <input class="form-control" type="date" name="fecha2" disabled="disabled" id="b" ></input>
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>
              <div class="row col-md-12 mb-3">
                <div class="col-md-5 m-auto">
                <label for="validationServer01">Tipo de Procedimiento</label>
                </div>
                <div class="col-md-7 ">
                <select  class="form-select" disabled="disabled" name="procedimiento" id="d">
                <?php while($fic = $consulta_procedimiento->fetch_assoc()){?>
                        <option value="<?php echo $fic['NOMBRE_PROCE']?>"><?php echo $fic['NOMBRE_PROCE']?></option>
                    <?php } ?>
                </select>
                </div>
              </div>
              
              <div class=" col-md-12 mb-3">
                <label for="validationServer01">Mensaje</label>
                <textarea class="form-control" id="c" disabled="disabled"  name="mensaje" placeholder="Obligatorio"></textarea>
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>
                </div>
                

             

                <div class="modal-footer">
                    <button class="btn col-md-12" type="submit">Enviar</button>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>
