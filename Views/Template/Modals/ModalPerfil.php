<!-- Modal -->
<div class="modal fade" id="modalFormPerfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerUpdate">
        <h5 class="modal-title" id="titleModal">Actualizar Datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario -->

        <form id="formPerfil" name="formPerfil" class="form-horizontal">
          <input type="hidden" id="idUsuario" name="idUsuario">
          <p class="text-primary">TLos campos con asterisco (<span class="required">*</span>) son obligatorios..</p>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtIdentificacion">Identificación <span class="required">*</span></label>
              <input type="text" class="form-control" name="txtIdentificacion" id="txtIdentificacion" value="<?= $_SESSION['userData']['identificacion'] ;?>" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtNombre">Nombres <span class="required">*</span></label>
              <input type="text" class="form-control" name="txtNombre" id="txtNombre" value="<?= $_SESSION['userData']['nombres'] ;?>" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="txtApellido">Apellidos <span class="required">*</span></label>
              <input type="text" class="form-control" name="txtApellido" id="txtApellido" value="<?= $_SESSION['userData']['apellidos'] ;?>" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtTelefono">Teléfono <span class="required">*</span></label>
              <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" value="<?= $_SESSION['userData']['telefono'] ;?>" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="txtEmail">Email</label>
              <input type="email" class="form-control" name="txtEmail" id="txtEmail" value="<?= $_SESSION['userData']['email_user'] ;?>" required="" readonly disabled>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtPassword">Password</label>
              <input type="password" class="form-control" name="txtPassword" id="txtPassword">
            </div>
            <div class="form-group col-md-6">
              <label for="txtPasswordConfirm">Confirmar Password</label>
              <input type="password" class="form-control" name="txtPasswordConfirm" id="txtPasswordConfirm">
            </div>
          </div>       

          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-info" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Actualizar</span></button>&nbsp;&nbsp;&nbsp;

            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>

          </div>
        </form>

      </div>
    </div>
  </div>
</div>