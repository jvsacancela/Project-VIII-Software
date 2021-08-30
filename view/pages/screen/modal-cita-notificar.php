
<div class="modal fade" id="modal-cita-notificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notificar citas médica</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="procedimiento_add.php" method="POST">
            <div class="form-row">

              <div class="row col-md-12 mb-3">
                <div class="col-md-4 m-auto">
                <label for="validationServer01">Cédula paciente</label>
                </div>
                
                <div class="col-md-8">
                <input type="text"   class="form-control " id="validationServer01" required name="cliente-id">
                <div class="valid-feedback">
                  Excelente!
                </div>
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