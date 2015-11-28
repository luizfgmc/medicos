
var url = "https://localhost/medicos/";
	
	function gerar_hash(){	

		$('#hash').val('Agurde...');	

		$.ajax({

			method:"post",
			url:url+"webservice/getChaveConsulta"

		}).done(function(data){

			$('#hash').val('');
			$('#hash').val(data);

			console.log(data);

		});

	
	}
	