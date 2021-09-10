
function registrar() {
	if ($('#id').val() == "") {
		$.ajax({
			type: 'POST',
			data: $("#form-registrar").serialize(),
			url: './../controlador/cliente.php?opcion=registrar',
			success: (data) => {
				console.log(data);
			$('#tabla_clientes').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
			document.getElementById("form-registrar").reset();
			}
		});
	}else{
		$.ajax({
			type: 'POST',
			data: $("#form-registrar").serialize(),
			url: './../controlador/cliente.php?opcion=actualizar',
			success: (data) => {
				console.log(data);
			$('#tabla_clientes').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
			document.getElementById("form-registrar").reset();
			$("#btn-main").html("Registrar cliente");
			}
		});
	}
	return false;
}

function listarUsuarios() {
	let table = $('#tabla_clientes').dataTable({
		"bProcessing": true,
		"serverSide": false,
		"responsive": true,
		"bFilter": true,
		"ajax": "./../controlador/cliente.php?opcion=listar",
		"bPaginate": true,
		"sInfo": true,
		"aoColumns": [
		{mData: 'numero'},
		{mData: 'nombre1'},
		{mData: 'apellido1'},
		{mData: 'direccion'},
		{mData: 'correo'},
		{mData: 'telefono'},
		{mData: 'celular'},
		{mData: 'estado'},
		{mData: 'acciones'}
		]
	});
}

function editarCliente(idCliente){
	$.ajax({
		type: 'POST',
		data: 'id=' + idCliente,
		url: './../controlador/cliente.php?opcion=editar',
		success: function(data) {
			let arr = JSON.parse(data);
			$('#id').val(arr.id);
			$("#numero").val(arr.numero);
			$("#nombre1").val(arr.nombre1);
			$("#nombre2").val(arr.nombre2);
			$("#apellido1").val(arr.apellido1);
			$("#apellido2").val(arr.apellido2);
			$("#direccion").val(arr.direccion);
			$("#correo").val(arr.correo);
			$("#telefono").val(arr.telefono);
			$("#celular").val(arr.celular);
			$("#estado").val(arr.estado);

			$("#btn-main").html("Actualizar cliente");
		}
	});
}

//cargar todo al iniciar
$(()=> {
    listarUsuarios();

    $("#btn-limpiar").click((e)=>{
    	e.preventDefault();
    	document.getElementById("form-registrar").reset();
    })
});