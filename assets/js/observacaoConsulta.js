	var url = "http://localhost/medicos/"

	// Linha da Solicitacao que vai ser apagada
	var avo="";

<<<<<<< HEAD
=======
	
	var url = "http://localhost/medicos/"

	// Linha da Solicitacao que vai ser apagada
	var avo="";
>>>>>>> pedro2
	$(document).on("click","#enviarObservacao", function(event) {

		var id = $(this).attr('valor');
		$('#obs').remove();
		$('#cancelar').remove();
		$('#enviarObs').remove();
		var pai =$(this).parent();
<<<<<<< HEAD
		avo =pai.parent();
		avo.css('height','200');
		$(this).after("<div class='comentarioMedico'><br/><textarea id='obs' rows='5' style=width:100%;></textarea><br/><button id='enviarObs' value="+id+"> Enviar </button> <button id='cancelar' value="+id+"> Cancelar </button> </div>");
=======
        avo =pai.parent();
		avo.css('height','200');
		$(this).after("<div class='comentarioMedico'><br/><textarea id='obs' rows='5' style=width:100%;></textarea><br/><button id='enviarObs' value="+id+"> Enviar </button> <button id='cancelar' value="+id+"> Cancelar </button> </div>");

>>>>>>> pedro2
	});

	$(document).on("click", "#cancelar", function(){
		$('#obs').remove();
		$('#enviarObs').remove();

	});	

	$(document).on("click","#enviarObs", function(event) {
<<<<<<< HEAD
		$.post(url+'solicitacao/salvarComentarioConsulta', {observacao:$('#obs').val(),solicitacao_id:$(this).val()}, function(data) {
			$('#obs').remove();
			$(this).remove();
			$('#enviarObs').remove();
			$('#enviarObs').after(data);
			$('#enviarObservacao').remove();
			$('#enviarObs').remove();
			$('#cancelar').remove();
			$('#cancelar').remove();
			avo.remove();
=======
					

		$.post(url+'solicitacao/salvarComentarioConsulta', {observacao:$('#obs').val(),solicitacao_id:$(this).val()}, function(data) {
				
				$('#obs').remove();
				$(this).remove();
				$('#enviarObs').remove();
				$('#enviarObs').after(data);
				$('#enviarObservacao').remove();
				$('#enviarObs').remove();
				$('#cancelar').remove();
			    $('#cancelar').remove();
			    avo.remove();

>>>>>>> pedro2
		});
	});