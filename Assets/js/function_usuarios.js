let tableUsuarios;

document.addEventListener('DOMContentLoaded', function(){

	tableUsuarios = $('#tableUsuarios').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax": {
			"url": " "+base_url+"/Usuarios/getUsuarios",

			"dataSrc":""
		},
		"columns": [
			{"data": "idpersona"},
			// {"data": "identificacion"},
			{"data": "nombres"},
			{"data": "apellidos"},
			{"data": "email_user"},
			{"data": "telefono"},
			{"data": "nombrerol"},
			{"data": "status"},
			{"data": "options"}
		],
		"responsieve": "true",
		"bDestroy": true,
		"iDisplayLength": 2,
		"order": [[0, "desc"]]
	});
	if (document.querySelector('#formUsuario')) {
		
		let formUsuario = document.querySelector('#formUsuario');
		formUsuario.onsubmit = function(e){
			e.preventDefault();

			let strIdentificacion = document.querySelector('#txtIdentificacion').value,
				strNombre = document.querySelector('#txtNombre').value,
				strApellido = document.querySelector('#txtApellido').value,
				strEmail = document.querySelector('#txtEmail').value,
				intTelefono = document.querySelector('#txtTelefono').value,
				intTipousuario = document.querySelector('#listRolid').value,
				strPassword = document.querySelector('#txtPassword').value;

			if (strIdentificacion == '' || strNombre == '' || strApellido == '' || strEmail == '' || intTelefono == '' || intTipousuario == '') {
				swal("Atención", "Todos los campos son obligatorios", "error");
				return false;
			}

			let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url+'/Usuarios/setUsuario';
			let formData = new FormData(formUsuario);
			request.open("POST", ajaxUrl, true);
			request.send(formData);
			request.onreadystatechange = function(){
				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);
					if (objData.status) {
						$('#modalFormUsuario').modal('hide');
						formUsuario.reset();
						swal("Usuarios", objData.msg, "success");
						tableUsuarios.api().ajax.reload(function(){
							fntRolesUsuario();
							// fntViewUsuario();
							// fntEditUsuario();
							// fntDelUsuario();
						});
					}else{
						swal("Error", objData.msg, "error");
					}
				}
			}

		}
	}

}, false);


window.addEventListener('load', function(){
	fntRolesUsuario();
	// fntViewUsuario();
	// fntEditUsuario();
	// fntDelUsuario();
}, false);

//Peticion AJAX para extrer todos los registros de roles
function fntRolesUsuario(){
	if (document.querySelector('#listRolid')) {
		
		let ajaxUrl = base_url+'/Roles/getSelectRoles';
		let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		request.open("GET", ajaxUrl, true);
		request.send();

		request.onreadystatechange = function(){
			if (request.readyState == 4 && request.status == 200) {
				document.querySelector('#listRolid').innerHTML = request.responseText;
				document.querySelector('#listRolid').value = 1;
				$('#listRolid').selectpicker('render');
				// $('#listRolid').selectpicker('refresh');

			}
		}
	}
}

// Mostrar modal para ver usuario
function fntViewUsuario(idpersona){
	// let btnViewUsuario = document.querySelectorAll('.btnViewUsuario');
	// btnViewUsuario.forEach(function(btnViewUsuario){
	// 	btnViewUsuario.addEventListener('click', function(){
			// let idpersona = this.getAttribute('us');
			var idpersona = idpersona;
			let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url+'/Usuarios/getUsuario/'+idpersona;
			request.open("GET", ajaxUrl, true);
			request.send();
			request.onreadystatechange = function(){
				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);

					if (objData.status)
					{
						let estadoUsuario = objData.data.status == 1 ?
						'<span class="badge badge-success">Activo</span>' :
						'<span class="badge badge-danger">Inactivo</span>' ;

						document.querySelector('#celIdentificacion').innerHTML = objData.data.identificacion;
						document.querySelector('#celNombre').innerHTML = objData.data.nombres;
						document.querySelector('#celApellido').innerHTML = objData.data.apellidos;
						document.querySelector('#celTelefono').innerHTML = objData.data.telefono;
						document.querySelector('#celEmail').innerHTML = objData.data.email_user;
						document.querySelector('#celTipoUsuario').innerHTML = objData.data.nombrerol;
						document.querySelector('#celEstado').innerHTML = estadoUsuario;
						document.querySelector('#celFechaRegistro').innerHTML = objData.data.fechaRegistro;
						$('#modalViewUser').modal('show');
					}else{
						swal("Error", objData.msg, "error");
					}
				}
			}


		// });
	// });
}

// Mostrar modal para editar usuario
function fntEditUsuario(idpersona){
	// let btnEditUsuario = document.querySelectorAll('.btnEditUsuario');
	// btnEditUsuario.forEach(function(btnEditUsuario){
	// 	btnEditUsuario.addEventListener('click', function(){

			document.querySelector('#titleModal').innerHTML = "Actualizar Usuario";
			document.querySelector('.modal-header').classList.replace('headerRegister', 'headerUpdate');
			document.querySelector('#btnActionForm').classList.replace('btn-primary', 'btn-info');
			document.querySelector('#btnText').innerHTML = "Actualizar";

			// let idpersona = this.getAttribute('us');
			var idpersona = idpersona;
			let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			let ajaxUrl = base_url+'/Usuarios/getUsuario/'+idpersona;
			request.open("GET", ajaxUrl, true);
			request.send();
			request.onreadystatechange = function(){

				if (request.readyState == 4 && request.status == 200) {
					let objData = JSON.parse(request.responseText);

					if (objData.status) {
						document.querySelector('#idUsuario').value = objData.data.idpersona;
						document.querySelector('#txtIdentificacion').value = objData.data.identificacion;
						document.querySelector('#txtNombre').value = objData.data.nombres;
						document.querySelector('#txtApellido').value = objData.data.apellidos;
						document.querySelector('#txtTelefono').value = objData.data.telefono;
						document.querySelector('#txtEmail').value = objData.data.email_user;
						document.querySelector('#listRolid').value = objData.data.idrol;
						$('#listRolid').selectpicker('render');

						if (objData.data.status == 1) {
							document.querySelector('#listStatus').value = 1;
						}else{
							document.querySelector('#listStatus').value = 2;							
						}
						$('#listStatus').selectpicker('render');						
					}
				}
				
				$('#modalFormUsuario').modal('show');
			}


		// });
	// });
}

// Eliminar usuario
function fntDelUsuario(idpersona){
	// let btnDelUsuario = document.querySelectorAll('.btnDelUsuario');
	// btnDelUsuario.forEach(function(btnDelUsuario){
	// 	btnDelUsuario.addEventListener('click', function(){
			// let idUsuario = this.getAttribute('us');
			let idUsuario = idpersona;
			
			swal({
				title: "Eliminar Usuario",
				text: "¿Realmente desea eliminar el Usuario",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: "Sí, eliminar",
				cancelButtonText: "No, cancelar",
				closeOnConfirm: false,
				closeOnCancel: true
			}, function(isConfirm){

				if (isConfirm) {
					let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'),
						ajaxUrl = base_url+'/Usuarios/delUsuario/',
						strData = "idUsuario="+idUsuario;
					request.open("POST", ajaxUrl, true)	;
					request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					request.send(strData);
					request.onreadystatechange = function(){
						if (request.readyState == 4 && request.status == 200) {
							let objData = JSON.parse(request.responseText);
							if (objData.status) {
								swal("Eliminar!", objData.msg, "success");
								tableUsuarios.api().ajax.reload(function(){
									fntRolesUsuario();
									// fntViewUsuario();
									// fntEditUsuario();
									// fntDelUsuario();
								});
							}else{
								swal("Atención", objData.msg, "error");
							}
						}
					}
				}

			});
		// });
	// });
}

//Abrir Modal
function openModal() {
	document.querySelector('#idUsuario').value = "";
	document.querySelector('.modal-header').classList.replace('headerUpdate', 'headerRegister');
	document.querySelector('#btnActionForm').classList.replace('btn-info', 'btn-primary');
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nuevo Usuario";
	document.querySelector('#formUsuario').reset();
	$('#modalFormUsuario').modal('show');

}

//
function openModalPerfil(){
	$('#modalFormPerfil').modal('show');
}