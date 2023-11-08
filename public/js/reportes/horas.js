toastr.options = {
    "closeButton": true,
    "progressBar": true
};
$(document).ready(function() {
    var table = $('#tabla-nomina').DataTable({
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "copyTitle": "Copiar al portapapeles",
                copySuccess: {
                  _: "%d filas copiadas al portapapeles",
                  1: "1 fila copiada al portapapeles"
                }
            }
        },
        search: {
            return: true
        },
        dom: "<'row'<'col-sm-12 col-md-12 d-flex justify-content-end'B>>" + 
            "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12't>>" + // Tabla principal
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [
            {
                extend: 'pdf',
                title: 'Reporte de Horas Trabajadas del personal',
                filename: function(){
                    var d = new Date();
                    var date = d.toISOString().slice(0,10);
                    var time = d.getHours() + "-" + d.getMinutes() + "-" + d.getSeconds();
                    return 'Reporte de Horas Trabajadas del personal_' + date + "_" + time;
                },
                customize: function ( doc ) {
                    doc.content.splice( 0, 0, {
                        text: 'Atessa SEM de CV',
                        alignment: 'right'
                    } );
                },
                orientation: 'landscape',
                pageSize: 'LEGAL'
            },
            {
                extend: 'excel',
                title: 'Reporte de Horas Trabajadas del personal',
                filename: function(){
                    var d = new Date();
                    var date = d.toISOString().slice(0,10);
                    var time = d.getHours() + "-" + d.getMinutes() + "-" + d.getSeconds();
                    return 'Reporte de Horas Trabajadas del personal_' + date + "_" + time;
                }                          
            }
        ],
        columnDefs: [
            { width: '5%', targets: 0 },
            { width: '13%', targets: 1 },
            { width: '9%', targets: 2 },
            { width: '9%', targets: 3 },
            { width: '9%', targets: 4 },
            { width: '9%', targets: 5 },
            { width: '9%', targets: 6 },
            { width: '9%', targets: 7 },
            { width: '9%', targets: 8 },
            { width: '9%', targets: 9 },
            { width: '9%', targets: 10 },
            { width: '9%', targets: 11 },
        ]
    });
});