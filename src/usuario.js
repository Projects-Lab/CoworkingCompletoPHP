
function registrar(){	
	$.ajax({
			type: 'POST',
			data: $("#registro_usuario").serialize(),
			url: './../controlador/usuario.php?opcion=registrar',
			success: data => {
				if (data == "1") {
				$('#tabla-usuario').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
				Swal.fire('Excelente!', 'Usuario agregado con exito!', 'success');
			}else if(data == "0"){
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Ha ocurrido un error'
				});
			}
		}
	});
	return false;
}

function listarUsuario() {
	let table = $('#tabla-usuario').dataTable({
		"bProcessing": true,
		"serverSide": false,
		"responsive": true,
		"pageLength": 5,
		"bFilter": true,
		"ajax": "./../controlador/usuario.php?opcion=listar",
		"bPaginate": true,
		"sInfo": true,
		"aoColumns": [
		{mData: 'usuario'},
		{mData: 'estado'},
		{mData: 'rol'},
		{mData: 'acciones'}
		]
	});
}
function editarUsuario(idUsuario){
	$.ajax({
		type: 'POST',
		data: 'id=' + idUsuario,
		url: './../controlador/usuario.php?opcion=editar',
		success: data => {
			let arr = JSON.parse(data);
			$('#ModalUsuarios').modal('show');

			$("#id").val(arr.id);
			$("#usuario").val(arr.usuario);
			$("#rol").val(arr.rol);
			$("#estado").val(arr.estado);
		}
	});
}
function actualizarUsuario(){
	$.ajax({
		type: 'POST',
		data: $("#registro_usuario").serialize(),
		url: './../controlador/usuario.php?opcion=actualizar',
		success: data => {
			if (data == "1") {
				$('#ModalUsuarios').modal('hide');
						$('#tabla-usuario').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
						Swal.fire('Excelente!', 'Usuario actualizado con exito!', 'success');
					}else if(data == "0"){
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'Ha ocurrido un error'
						});
					}
				}
			});
}


$(()=>{

	listarUsuario();

	$("#editar_clave").click(function(){
		$('#ModalClave').modal('show');
	});

})
