
<div class="modal fade" id="modal-procedimiento-add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar procedimiento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationServer01">Nombre del procedimiento</label>
                <input type="text"   class="form-control " id="validationServer01" required name="procedimiento-nombre">
                <div class="valid-feedback">
                  Excelente!
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="validationServer02">Tiempo de tratamiento</label>
                <input type="time" class="form-control" id="validationServer02" required name="procedimiento-hora">
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