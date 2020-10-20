<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario -->

        <form id="formUsuario" name="formUsuario" class="form-horizontal">
          <input type="hidden" id="idUsuario" name="idUsuario">
          <p class="text-primary">Todos los campos son obligatorios.</p>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtIdentificacion">Identificación</label>
              <input type="text" class="form-control" name="txtIdentificacion" id="txtIdentificacion" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtNombre">Nombres</label>
              <input type="text" class="form-control" name="txtNombre" id="txtNombre" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="txtApellido">Apellidos</label>
              <input type="text" class="form-control" name="txtApellido" id="txtApellido" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtTelefono">Teléfono</label>
              <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="txtEmail">Email</label>
              <input type="email" class="form-control" name="txtEmail" id="txtEmail" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="listRolid">Tipo usuario</label>
              <select class="form-control" data-live-search="true" name="listRolid" id="listRolid" required="">
              </select> 
            </div>
            <div class="form-group col-md-6">
              <label for="listStatus">Status</label>
              <select class="form-control selectpicker" name="listStatus" id="listStatus" required="">
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtPassword">Password</label>
              <input type="password" class="form-control" name="txtPassword" id="txtPassword">
            </div>
          </div>       

          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;

            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>

          </div>
        </form>

      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Identificación:</td>
              <td id="celIdentificacion">654654654</td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre">Jacob</td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellido">Jacob</td>
            </tr>
            <tr>
              <td>Teléfono:</td>
              <td id="celTelefono">Larry</td>
            </tr>
            <tr>
              <td>Email (Usuario):</td>
              <td id="celEmail">Larry</td>
            </tr>
            <tr>
              <td>Tipo Usuario:</td>
              <td id="celTipoUsuario">Jacob</td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado">Jacob</td>
            </tr>
            <tr>
              <td>Fecha Registro:</td>
              <td id="celFechaRegistro">Jacob</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>