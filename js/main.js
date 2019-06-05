$(document).ready(function () {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({ boundary: 'window' })
    })

    $('table:not(.semdatatable)').DataTable(
        {
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            "sDom": "<'row'<'span8'l><'span8'f>r>t<'row'<'span8'i><'span8'p>>"
        }
    );

    new Cleave('.input-1', {
        numericOnly: true,
        blocks: [0, 2, 0, 4, 4],
        delimiters: ["(", ")", " ", "-"]
    });
});