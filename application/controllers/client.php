<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
	
	class Client extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->library("Nusoap_library");
		}

		function index() {

			$this->nusoap_client = new nusoap_client("http://localhost/medicos/soapserver");
			
			if($this->nusoap_client->fault) {
				
				 $text = 'Error: '.$this->nusoap_client->fault;
			
			} else {
				
				if ($this->nusoap_client->getError()) {
					 
					 $text = 'Error: '.$this->nusoap_client->getError();
				
				} else {
					 
						/* teste do webservice*/
					 $chave = $this->nusoap_client->call(
							  'getChaveConsulta',
							   array('thales_ferraz2@hotmail.com', 'teste')
							);
					
					var_dump ($chave);
					$chave = json_decode($chave); // tem que dar json decode na chave porque o parametro pra enviar é string
					
					// chamar metodo getAgendaDia do webservice
					$agenda = $this->nusoap_client->call(
							  'getAgendaDia',
							   array($chave, '2015-10-24')
							);
					
					echo ('</br></br></br>Agenda dia: ');
					$agenda = json_decode($agenda); // O retorno do webservice é em Json entao tem que dar decode pra mostrar em array na tela
					var_dump($agenda);
					
					// chamar metodo getAgendaPeriodo do webservice
					$agenda = $this->nusoap_client->call(
							  'getAgendaPeriodo',
							   array($chave, '2014-10-10', '2016-10-10')
							);
					
					$agenda = json_decode($agenda);
					
					echo ('</br></br>Agenda periodo: ');
					var_dump($agenda);
					
					
					
					
					/* Teste metodos compareceu e nao compareceu
					$controllers =& get_instance();
					$controllers->load->model('../controllers/Solicitacao');
					
					$idSolicitacao = 13;
					
					$teste = $controllers->Solicitacao->compareceu($idSolicitacao);
					
					*/
					
					/* testar remarcar consulta
					$controllers =& get_instance();
					$controllers->load->model('../controllers/Solicitacao');
					$idSolicitacao = 13;
					
					$dataHoje = date("Y-m-d");
					$dataFutura = date('Y-m-d', strtotime('+2 days', strtotime($dataHoje)));
					$hora = date("H:i:s");
					
					//echo ($data . ' ' . $hora);
					
					$controllers->Solicitacao->remarcar($idSolicitacao, $dataFutura, $hora);
					*/
					
					/* testar enviar cartao agradecimento medico
					$controllers =& get_instance();
					$controllers->load->model('../controllers/Medico');
					$idSolicitacao = 72;
					
					$controllers->Medico->enviarCartaoAgradecimento($idSolicitacao);
					*/
					
					/* testar incluir paciente novo
					$models =& get_instance();
					$models->load->model('PacienteModel');
					
					 $arr = array(
						"nome" => 'Thales Ferraz',
						"cpf" => '000.000.000-00',
						"endereco" => 'rua x',
						"end_numero" => 'yy',
						"complemento" => 'zz',
						"bairro" => 'kk',
						"uf" => 'MG',
						"cidade" => 'BH',
						"cep" => '00000-000',
						"telefone" => '00 0 0000-0000',
						"atividade" => 'A',
						"created_at" => date("Y-m-d H:i:s"),
						"updated_at" => date("Y-m-d H:i:s")

					 );
					
					$models->PacienteModel->inserePaciente($arr);
					
					*/
					/*
					// teste top 10
					$models =& get_instance();
					$models->load->model('MedicoModel');
					
					$query = $models->MedicoModel->top10();
					
					var_dump($query);
					*/
					
					
				}
			}
		}
	
	}
?>
