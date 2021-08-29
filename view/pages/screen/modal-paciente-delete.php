<div class="modal fade" id="modal-paciente-delete<?php echo $display['CED_PA'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <?php echo "¿Eliminar a"?>
            <?php echo $display['NOMBRE_COMPLETOS'] . "?"?>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <a class="desc" href="../../app/php/procedimiento_delete.php?NOMBRE_PROCE=<?php echo $display['CED_PA']?>"><i class="icon ion-md-checkmark"></i>Si, eliminar paciente.</a>

      </div>
    </div>
  </div>
</div>