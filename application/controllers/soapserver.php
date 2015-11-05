<?php
	
error_reporting(E_ALL);
ini_set('display_errors', 1);
	
	class Soapserver extends CI_Controller {
		
		function Soapserver() {
		
			parent::__construct();
			
			$this->load->library("Nusoap_library");
			
			$rota = $_SERVER['HTTP_HOST']. '/soapserver';
			$tituloPagina = 'WebService Medico Amigo';
			$urn = 'urn:SOAPServerWSDL';
			
			//$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : ""; // procurar saber mais sobre isso
			$this->server = new soap_server();
			$this->server->configureWSDL($tituloPagina, $rota);
			$this->server->wsdl->schemaTargetNamespace = $rota;
			
			// getChaveConsulta
			$this->server->register(
				'getChaveConsulta', 
				array ('usuarioMedico' => "xsd:string", 'senhaMedico' => "xsd:string"), 
				array ("chaveConsulta" => "xsd:string"), 
				$urn, 
				"urn:" .$rota. "#getChaveConsulta", 
				"rpc", 
				"encoded", 
				"Retornar a chave para realizar consultas no webservice."
			);
				
			// getAgendaDia
			$this->server->register(
				'getAgendaDia', 
				array ('chaveConsulta' => "xsd:string", 'dia' => "xsd:string"), 
				array ("return" => "xsd:string"), 
				$urn, 
				"urn:" .$rota. "#getAgendaDia", 
				"rpc", 
				"encoded", 
				"Retornar as informações do banco referente ao dia especificado no formato json."
			);
			
			// getAgendaPeriodo
			$this->server->register(
				'getAgendaPeriodo', 
				array ('chaveConsulta' => "xsd:string", 'diaInicial' => "xsd:string", 'diaFinal' => "xsd:string"), 
				array ("agenda" => "xsd:string"), 
				$urn, 
				"urn:" .$rota. "#getAgendaPeriodo", 
				"rpc", 
				"encoded", 
				"Retornar as informações do banco referente ao período especificado no formato json."
			);

		}
		
		function index() {
			
			function getAgendaDia($chaveConsulta, $dia) {
				$controllers =& get_instance();
				$controllers->load->model('../controllers/Solicitacao');
				
				return $controllers->Solicitacao->getHorariosMedicoDia($chaveConsulta, $dia, 'json');
				
			}
			
			function getAgendaPeriodo($chaveConsulta, $diaI, $diaF) {
				$controllers =& get_instance();
				$controllers->load->model('../controllers/Solicitacao');
				
				return $controllers->Solicitacao->getHorariosMedicoPeriodo($chaveConsulta, $diaI, $diaF, 'json');
				
			}
			
			function getChaveConsulta($usuario, $senha) {
				
				$controllers =& get_instance();
				$controllers->load->model('../controllers/Medico');
				
				$idMedico = $controllers->Medico->obterIdMedico($usuario, $senha);
				
				if ($idMedico > 0) {
					
					$chave = $controllers->Medico->gerarHash($idMedico, 'json');
					
				}
				
				return $chave;
				
			}
			
			if($this->uri->segment(3) == "wsdl") {
				
				$_SERVER['QUERY_STRING'] = "wsdl";
			
			} else {
			
				$_SERVER['QUERY_STRING'] = "";

			}
			
			$this->server->service(file_get_contents("php://input"));
			
		}

	}
?>