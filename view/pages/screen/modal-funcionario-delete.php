<div class="modal fade" id="modal-funcionario-delete<?php echo $display['CED_FUN'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Eliminar funcionario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        <span>¿Esta seguro de eliminar a </span>
        <span class="text-uppercase"><?php echo $display['NOMBRE_COMPLETOS'] . "?"?></span>
      </div>

      <div class="modal-footer">
        <a class="desc" href="../../app/php/funcionario_delete.php?FUN_CED=<?php echo $display['CED_FUN']?>"><i class="icon ion-md-checkmark"></i>Si, eliminar funcionario.</a>
      </div>

    </div>
  </div>
</div>