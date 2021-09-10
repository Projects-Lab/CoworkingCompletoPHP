var precioHora = "";
const options2 = { style: 'currency', currency: 'USD' };
const numberFormat2 = new Intl.NumberFormat('en-US', options2);


function obtenerAsignaciones() {
    $.ajax({
        type: 'POST',
        data: 'idSala='+ $('#salas').val(),
        url: './../controlador/asignacion.php?opcion=listarAsignacion',
        success: (data) => {
            let result = JSON.parse(data);
            console.log(result);
            table.clear();
            table.rows.add(result.data).draw();
        }
    });
}

var table;

table = $('#tabla_asignacion').DataTable({
    responsive: 'true',
    dom: 'lBfrtip',
    buttons: ['excel', 'pdf'],
    columns: [
        {"data": "nombre1"},
        {"data": "fecha"},
        {"data": "hora_inicio"},
        {"data": "hora_final"},
        {"data": "nota"}
    ]
});


function cargarCliente(numero){
	$.ajax({
			type: 'POST',
			data: 'numero=' + numero,
			url: './../controlador/asignacion.php?opcion=cargarCliente',
			success: (data) => {
				if(data){
					let arr = JSON.parse(data);
					$("#cliente").val(arr.nombre1);
					$("#idCliente").val(arr.id);
				}else{
					console.log(data);
				}
			}
		});
}

function cargarSala(){
	$.ajax({
			type: 'POST',
			data: 'numero=' + numero,
			url: './../controlador/asignacion.php?opcion=cargarSala',
			success: (data) => {
				data = JSON.parse(data);
				if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione sala</option>";
                $.each(data, function (key, value) {                	
                    select = select + "<option value=" + value['id'] + ">" + value['nombre'] + "</option>";
                });
                $('#salas').html(select);
            	}
			}
	});

}

function setSala(){
	let sala = $("#salas option:selected" ).text();
	$("#sala_select").html(sala);
	obtenerAsignaciones();
	$.ajax({
		type: 'POST',
		data: 'id=' + $("#salas").val(),
		url: './../controlador/asignacion.php?opcion=cargarPrecio',
		success: function(data) {
			let arr = JSON.parse(data);
			$("#precio_sala").html(numberFormat2.format(arr.precio_hora)+ " /h");
			precioHora = arr.precio_hora;
		}
	});
}

function calcularTotal(){
	let total = $("#total_horas").val() * precioHora;
	$("#horas_numero").html($("#total_horas").val());
	$("#total").val(total);
	$("#totalproceso").val(numberFormat2.format(total));
	$("#total_resumen").html(numberFormat2.format(total));
}

function asignar_sala() {
	$.ajax({
		type: 'POST',
		data: $("#asignarSala").serialize(),
		url: './../controlador/asignacion.php?opcion=asignar',
		success: function(data){
			if(data == "1"){
				$("#asignarSala")[0].reset();
				alert("registro exitoso");
			}else{
				alert("error en el registro");
			}
		}
	});
	return false;
}


$(function() {
	$("#numero").focus();
	cargarSala();

    $("#numero").focusout(()=>{
    	cargarCliente($("#numero").val());
    });

});