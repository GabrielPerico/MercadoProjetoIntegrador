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
    var DepRow = 0;
    $("#createDep").click(function (e) {
        DepRow++;
        e.preventDefault();
        var InnerHTML = '';
        InnerHTML += '<tr id="row' + DepRow + '"><th>';
        InnerHTML += '<input placeholder="* Nome" class="form-control form-control-lg rounded-0" type="text" id="nome" name="nome[]">';
        InnerHTML += '</th><th>';
        InnerHTML += '<textarea placeholder="* Descrição" class="form-control form-control-lg rounded-0" name="descricao[]" id="descricao" cols="30" rows="1"></textarea>';
        InnerHTML += '</th>';
        InnerHTML += '<th class="align-middle"><a id="' + DepRow + '" class="btn btn-outline-danger deleteRow" href="#"><i class="far fa-times-circle"></i></a></th>'
        InnerHTML += '</tr>';
        $("#departamento").append(InnerHTML);
    });
    var ProRow = 0;
    $("#createPro").click(function (e) {
        ProRow++;
        e.preventDefault();
        var produtos = $('meta[name=produtos]').attr('content');
        produtos = JSON.parse(produtos);
        var InnerHTML = '';
        InnerHTML += '<tr id="row' + ProRow + '"><th>';
        InnerHTML += '<input placeholder="* Porcentagem" class="form-control form-control-lg rounded-0" type="number" id="nome" name="porcent[]" value="">';
        InnerHTML += '</th><th>';
        InnerHTML += '<select class="form-control form-control-lg rounded-0" name="produto[]">';
        InnerHTML += '<option selected hidden value="">Produto</option>';
        produtos.forEach(function (element, index, array) {
            if (index >= 0) {
                InnerHTML += '<option value="' + array[index]['id_produto'] + '">' + array[index]['tx_nome'] + '</option>';
            } else {
                InnerHTML += '<option value="" disabled>Não há departamentos cadastrados</option>';
            }
        });
        InnerHTML += '</select></th>';
        InnerHTML += '<th class="align-middle"><a id="' + ProRow + '" class="btn btn-outline-danger deleteRow" href="#"><i class="far fa-times-circle"></i></a></th>'
        InnerHTML += '</tr>';
        $("#produtos").append(InnerHTML);
    });
    $("#mostrar").click(function (e) {
        e.preventDefault();
        if ($("#mostrar").hasClass('btn-success')) {
            $("#mostrar").removeClass('btn-success')
            $("#mostrar").addClass('btn-danger')
            $("input[name=mostrar]").val(0);
        } else {
            $("#mostrar").removeClass('btn-danger')
            $("#mostrar").addClass('btn-success')
            $("input[name=mostrar]").val(1);
        }
    });
    var CatRow = 0;
    $("#createCat").click(function (e) {
        CatRow++;
        e.preventDefault();
        var departamentos = $('meta[name=departamentos]').attr('content');
        departamentos = JSON.parse(departamentos);
        var InnerHTML = '';
        InnerHTML += '<tr id="row'+CatRow+'"><th>';
        InnerHTML += '<input placeholder="* Nome" class="form-control form-control-lg rounded-0" type="text" name="nome[]" value="">';
        InnerHTML += '</th><th>';
        InnerHTML += '<textarea placeholder="* Descrição" class="form-control form-control-lg rounded-0" name="descricao[]" id="descricao" cols="30" rows="1"></textarea>';
        InnerHTML += '</th><th>';
        InnerHTML += '<select class="form-control form-control-lg rounded-0" name="departamento[]" id="departamento"><option selected hidden disabled>* Departamento</option>';
        departamentos.forEach(function (element, index, array) {
            if (index >= 0) {
                InnerHTML += '<option value="' + array[index]['id_departamento'] + '">' + array[index]['tx_nome'] + '</option>';
            } else {
                InnerHTML += '<option value="" disabled>Não há departamentos cadastrados</option>';
            }
        });
        InnerHTML += '</select></th>';

        InnerHTML += '<th class="align-middle"><a id="' + CatRow + '" class="btn btn-outline-danger deleteRow" href="#"><i class="far fa-times-circle"></i></a></th></tr>'
        $("#categoria").append(InnerHTML);
    });

    var imgNum = 0;
    $("#createImg").click(function (e) {
        e.preventDefault();
        imgNum++;
        var InnerHTML = '';
        InnerHTML += '<tr id="row' + imgNum + '"><th class="align-middle">';
        InnerHTML += '<div class="custom-file">';
        InnerHTML += '<input type="file" class="custom-file-input" onchange="readURL(this,' + imgNum + ');" name="files[]" id="customFile' + imgNum + '">';
        InnerHTML += '<label class="custom-file-label" for="customFile' + imgNum + '">Escolha um arquivo</label>';
        InnerHTML += '</div>';
        InnerHTML += '</th><th>';
        InnerHTML += '<img src="http://denrakaev.com/wp-content/uploads/2015/03/no-image.png" alt="Sua imagem" class="preview" id="preview' + imgNum + '">';
        InnerHTML += '</th><th class="align-middle">';
        InnerHTML += '<a id="' + imgNum + '" class="btn btn-outline-danger deleteRow" href="#"><i class="far fa-times-circle"></i></a>'
        InnerHTML += '</th></tr>';

        $('#imagens').append(InnerHTML);
    });
    $(document).on('click', '.deleteRow', function (e) {
        e.preventDefault();
        var id = $(this).attr('id');
        $('#row' + id).remove();
    })
});
function readURL(input, metaNum) {
    var preview = '#preview' + metaNum;
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(preview).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}