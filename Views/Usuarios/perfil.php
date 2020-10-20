<?php headerAdmin($data);
		getModal('modalPerfil', $data);
?>
<main class="app-content">
      <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="<?= media(); ?>/images/avatar.png">
              <h4><?= $_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos']; ?></h4>
              <p><?= $_SESSION['userData']['nombrerol']; ?></p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Datos personales</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Datos fiscales</a></li>
              <li class="nav-item"><a class="nav-link" href="#datos" data-toggle="tab">Pagos</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">
              	<!-- TODO -->
              	<!-- TODO -->
              	<!-- TODO: Agregar columna de imagen de perfil en BD y los métodos necesarios para mostrar, seleccionar, etc... -->
                <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                  <div class="content">
                    <h5>DATOS PERSONALES <button class="btn btn-sm btn-info" type="button" onclick="openModalPerfil();"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button></h5>
                  </div>
                </div>
                <table class="table table-bordered">
                	<tbody>
                		<tr>
                			<td style="width: 150px">Identificación:</td>
                			<td><?= $_SESSION['userData']['identificacion']; ?></td>
                		</tr>
                		<tr>
                			<td>Nombres:</td>
                			<td><?= $_SESSION['userData']['nombres']; ?></td>
                		</tr>
                		<tr>
                			<td>Apellidos:</td>
                			<td><?= $_SESSION['userData']['apellidos']; ?></td>
                		</tr>
                		<tr>
                			<td>Teléfono:</td>
                			<td><?= $_SESSION['userData']['telefono']; ?></td>
                		</tr>
                		<tr>
                			<td>Email (Usuario):</td>
                			<td><?= $_SESSION['userData']['email_user']; ?></td>
                		</tr>
                		<tr>
                			<td>Tipo Usuario:</td>
                			<td><?= $_SESSION['userData']['nombrerol']; ?></td>
                		</tr>              		
                	</tbody>
                </table>
              </div>
            </div>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Datos fiscales</h4>
                <form id="formDataFiscal" name="formDataFiscal">
                  <div class="row mb-4">
                    <div class="col-md-6">
                      <label>Identificación Tributaria</label>
                      <input class="form-control" type="text" id="txtNit" name="txtNit" value="<?= $_SESSION['userData']['nit'] ;?>">
                    </div>
                    <div class="col-md-6">
                      <label>Nombre Fiscal</label>
                      <input class="form-control" type="text" id="txtNombreFiscal" name="txtNombreFiscal" value="<?= $_SESSION['userData']['nombrefiscal'] ;?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <label>Dirección Fiscal</label>
                      <input class="form-control" type="text" id="txtDirFiscal" name="txtDirFiscal" value="<?= $_SESSION['userData']['direccionfiscal'] ;?>">
                    </div>                    
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="tab-pane fade" id="datos">
            	<div class="tile user-setting">
            		<p>Pagos</p>
            	</div>
            </div>

          </div>
        </div>
      </div>
    </main>
<?php footerAdmin($data); ?>