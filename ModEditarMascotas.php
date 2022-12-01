 <!-- Modal -->
 <div class="modal fade" id="ModEditarMascotas<?php echo $ver[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="ModEditarMascotaslavel" aria-hidden="true">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header" >
         <h5 id="ModEditarMascotaslavel">Editar registro</h5>
       </div>
       <div class="modal-body">


       <form action="develop/php/EditarMascotas.php" method="POST" name="form">
           <input type="hidden" name="Id" value="<?php echo $ver[0]; ?>">
           <div class="mb-2">
             <label class="form-label">Foto</label>
             <input type="file" class="form-control" name="Foto" value="<?php echo $ver[1]; ?>" placeholder="">
           </div>
           <div class="mb-2">
             <label class="form-label">Seleciona la especie: &nbsp;</label>
             <select class="form-select" aria-label="Default select example" name="Raza" value="<?php echo $ver[3]; ?>">
               <option value="Perro" selected>Perro</option>
               <option value="Gato">Gato</option>
             </select>
           </div>
           <div class="mb-2">
             <label class="form-label">Seleciona el sexo: &nbsp;</label>
             <select class="form-select" aria-label="Default select example" name="Sexo" value="<?php echo $ver[5]; ?>">
               <option value="Macho">Macho</option>
               <option value="Hembra">Hembra</option>
             </select>
           </div>
           <div class="mb-2">
             <input type="text" class="form-control" name="Nombre" value="<?php echo $ver[2]; ?>" placeholder="Nombre" required>
           </div>
           <div class="mb-2">
             <input type="text" class="form-control" name="Color" value="<?php echo $ver[6]; ?>" placeholder="Color" required>
           </div>
           <div class="mb-2">
             <input type="text" class="form-control" name="Peso" value="<?php echo $ver[5]; ?>" placeholder="Peso" required>
           </div>
           <div class="mb-2">
             <input type="text" class="form-control" name="Edad" value="<?php echo $ver[7]; ?>" placeholder="Edad" require>
           </div>
           <br>
           
           <div class="modal-footer">
             <button type="button" class="btn_btn-warning_bi_bi-pen" data-dismiss="modal">Cerrar</button>
             <button type="submit" class="btn_btn-warning_bi_bi-pen">Guardar</button>
           </div>
         </form>
       </div>
     </div>
   </div>
 </div>