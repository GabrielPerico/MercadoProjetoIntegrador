$(document).ready(function () {
    $("#menuItens").hide();
	var preco = $('#preco').text();
	parseFloat(preco);
	$('#parcelamento').change(function() {
		var parcelamento = $('#parcelamento').val();
		var precoAtual = (preco / parcelamento);
		var precoAtual = precoAtual.toFixed(2);
		$('#preco').text(precoAtual);

	})
});
$("#menu").click(function(e){
	e.preventDefault();
	$("#menuItens").slideToggle();
		
})