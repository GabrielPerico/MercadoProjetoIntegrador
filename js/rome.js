var data = $("meta[name=data]").attr("content");
if (data !== "") {
	data = JSON.parse(data);
}
var start = "0000-00-00 00:00:00";
var end = "0000-00-00 00:00:00";

if (!data.lenght > 0) {
	start = data["dt_inicioDaPromocao"];
	end = data["dt_fimDaPromocao"];
}
$(document).ready(function () {
	var dt_inicio = $("#input1").val();
	$("input[name=dtInicio]").val(dt_inicio);
	var dt_fim = $("#input2").val();
	$("input[name=dtFim]").val(dt_fim);

});

rome(input1, {
	timeFormat: "HH:mm:ss",
	inputFormat: "YYYY-MM-DD HH:mm:ss",
	initialValue: start
});
rome(input2, {
	timeFormat: "HH:mm:ss",
	inputFormat: "YYYY-MM-DD HH:mm:ss",
	initialValue: end
});

$("#input1").blur(function () {
	dt_inicio = $("#input1").val();
	$("input[name=dtInicio]").val(dt_inicio);
});
$("#input2").blur(function () {
	dt_fim = $("#input2").val();
	$("input[name=dtFim]").val(dt_fim);
});

