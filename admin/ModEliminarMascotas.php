<!-- Ventana modal para eliminar -->
<div class="modal fade" id="ModEliminarMascotas<?php echo $ver[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #BB2D3B !important;">
            <h4 class="modal-title" style="color:antiquewhite">
                ¿Realmente deseas eliminar a ? 
            </h4>
        </div>
        <form action="php/EliminarMascota.php" method="POST" name="form">
        <div class="modal-body">
          <strong style="text-align: center !important"> 
            <h3><?php echo $ver[2]; ?></h3>
          </strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input type="hidden" name="id" value="<?php echo $ver[0];?>">
          <button class="btn btn-danger" type="submit">Borrar</button>
        </div>

        </form>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->