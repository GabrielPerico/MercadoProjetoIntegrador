var data = $("meta[name=data]").attr('content');
if(data !== ''){
    data = JSON.parse(data);
}
var start = '0000-00-00 00:00:00';
var end = '0000-00-00 00:00:00';

if(!data.lenghy > 0){
    start = data['dt_inicioDaPromocao'];
    end = data['dt_fimDaPromocao'];
}
rome(input1, {
    "timeFormat": "HH:mm:ss",
    "inputFormat": "YYYY-MM-DD HH:mm:ss",
    "initialValue": start
});
rome(input2, {
    "timeFormat": "HH:mm:ss",
    "inputFormat": "YYYY-MM-DD HH:mm:ss",
    "initialValue": end
});

$("#input1").change(function (e) { 
    e.preventDefault();
    var dt_inicio = $('#input1').val();
    $('input[name=dtInicio]').val(dt_inicio);
});
$("#input2").change(function (e) {
    e.preventDefault();
    var dt_fim = $('#input2').val();
    $('input[name=dtFim]').val(dt_fim);
})