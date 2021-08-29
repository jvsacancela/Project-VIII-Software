<div class="modal fade" id="modal-procedimiento-delete<?php echo $display['PROCE_ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <?php echo "¿Eliminar "?>
            <?php echo $display['NOMBRE_PROCE'] . "?"?>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <a class="desc" href="../../app/php/procedimiento_delete.php?NOMBRE_PROCE=<?php echo $display['NOMBRE_PROCE']?>"><i class="icon ion-md-checkmark"></i>Si, eliminar procedimineto.</a>

      </div>
    </div>
  </div>
</div>