
	
	var url = "http://localhost/medicos/"	
	
	$(document).on("click","#enviarObservacao", function(event) {

		var id = $(this).attr('valor');
		$('#obs').remove();
		$('#cancelar').remove();
		$('#enviarObs').remove();
		$(this).after("<br/><textarea id='obs' rows='5' style=width:100%;></textarea><br/>");
		$('#obs').after("<button id='enviarObs' value="+id+"> Enviar </button> ");
		$('#enviarObs').after("<button id='cancelar' value="+id+"> Cancelar </button> ");


	});

	$(document).on("click", "#cancelar", function(){
		$('#obs').remove();
		$('#enviarObs').remove();
		$('#cancelar').remove();
	});	

	$(document).on("click","#enviarObs", function(event) {
				

		$.post(url+'solicitacao/salvarComentarioConsulta', {observacao:$('#obs').val(),solicitacao_id:$(this).val()}, function(data) {
				
				$('#obs').remove();
				$(this).remove();
				$('#enviarObs').remove();
				$('#enviarObs').after(data);
				$('#enviarObservacao').remove();
				$('#enviarObs').remove();
				$('#cancelar').remove();

		});

	});

