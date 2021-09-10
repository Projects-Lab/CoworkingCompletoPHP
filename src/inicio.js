function listar() {
    var table = $('#tabla').dataTable({
        "responsive": true,
        "bFilter": true,
        "ajax": "./../controlador/asignacion.php?opcion=listarAsignaciones",
        "bPaginate": true,
        "sInfo": true,
        "dom": 'lBfrtip',
        "buttons": [
            'excel', 'pdf', 'print'
        ],
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No encontrado - lo siento",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay datos disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
        },
        "aoColumns": [
            {mData: 'nombre'},
            {mData: 'sala'},
            {mData: 'fecha'},
            {mData: 'hora1'},
            {mData: 'hora2'},
            {mData: 'nota'}
        ]
    });
}

//cargar todo al iniciar
$(()=> {
    listar();
});

