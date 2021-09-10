
function registrar() {
	if ($('#id').val() == "") {
		$.ajax({
			type: 'POST',
			data: $("#form-registrar").serialize(),
			url: './../controlador/sala.php?opcion=registrar',
			success: (data) => {
				console.log(data);
			$('#tabla-salas').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
			document.getElementById("form-registrar").reset();
			}
		});
	}else{
		$.ajax({
			type: 'POST',
			data: $("#form-registrar").serialize(),
			url: './../controlador/sala.php?opcion=actualizar',
			success: (data) => {
				console.log(data);
			$('#tabla-salas').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
			document.getElementById("form-registrar").reset();
			$("#btn-main").html("Registrar sala");
			}
		});
	}
	return false;
}

function listarSalas() {
	let table = $('#tabla-salas').dataTable({
		"bProcessing": true,
		"serverSide": false,
		"responsive": true,
		"pageLength": 5,
		"bFilter": true,
		"ajax": "./../controlador/sala.php?opcion=listar",
		"bPaginate": true,
		"sInfo": true,
		"aoColumns": [
		{mData: 'nombre'},
		{mData: 'precio'},
		{mData: 'estado'},
		{mData: 'acciones'}
		]
	});
}

function editarSala(idSala){
	$.ajax({
		type: 'POST',
		data: 'id=' + idSala,
		url: './../controlador/sala.php?opcion=editar',
		success: function(data) {
			let arr = JSON.parse(data);
			$('#id').val(arr.id);
			$("#nombre").val(arr.nombre);
			$("#precio").val(arr.precio_hora);
			$("#estado").val(arr.estado);
			$("#btn-main").html("Actualizar sala");
		}
	});
}

//cargar todo al iniciar
$(()=> {
    listarSalas();

    $("#btn-limpiar").click(()=>{
    	document.getElementById("form-registrar").reset();
    })
});