
<div class="modal fade" id="modal-filtrar-reporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Generar Reporte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="screen/reporte.php" method="POST">
            <div class="form-row">
              
              <div class=" col-md-12 mb-3">
                <label for="validationServer01">Fecha Inicial</label>
                <input class="form-control" type="date" name="fecha1" id="trord" onblur="document.getElementById('uno').value=this.value"></input>
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>
              <div class=" col-md-12 mb-3">
                <label for="validationServer01">Fecha Final</label>
                <input class="form-control" type="date" name="fecha2" id="uno"></input>
                <div class="valid-feedback">
                   Excelente!
                </div>
              </div>
              <div class="row col-md-12 mb-3">
                <div class="col-md-5 m-auto">
                <label for="validationServer01">Tipo de Procedimiento</label>
                </div>
                <div class="col-md-7 ">
                <select  class="form-select" name="procedimiento">
                <option value="">SELECIONE UN PROCEDIMIENTO</option>
                <?php while($fic = $consulta_procedimiento->fetch_assoc()){?>
                        <option value="<?php echo $fic['NOMBRE_PROCE']?>"><?php echo $fic['NOMBRE_PROCE']?></option>
                    <?php } ?>
                </select>
                </div>
              </div>
              
              <div class="row col-md-12 mb-3">
                <div class="col-md-5 m-auto">
                <label for="validationServer01">Estado</label>
                </div>
                <div class="col-md-7 ">
                <select  class="form-select" name="estado" id="notificacion" >
                    <option value="">SELECIONE UN ESTADO</option>
                  <option value="Pendiente">PENDIENTE</option>
                  <option value="Cancelado">CANCELADAS</option>
                  <option value="Expirado">EXPIRADA</option>

                </select>
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