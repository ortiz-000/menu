window.addEventListener('load', function() {
    initializeDataTable("#botas1");
    initializeDataTable("#botas2");
});

function initializeDataTable(selector) {
    $(selector).DataTable({
            "responsive": true,
            "autowidth": false,
            "lengthChange": true,
            "lengthmenu": [10, 25, 50,100],
            "language": {
            "lengthmenu ":"Mostrar MENU registros por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando página PAGE de PAGES",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de MAX registros totales)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "buttons":["csv", "excel", "pdf"]
    }).buttons().container().appendTo(selector + '_wrapper .col-md-6:eq(0)');
}