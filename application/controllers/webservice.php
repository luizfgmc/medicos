<?php
	
error_reporting(E_ALL);
ini_set('display_errors', 1);
	
	class webService extends CI_Controller {
		
		
			
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

			function getTodosHorariosMedico($chaveConsulta) {
				$controllers =& get_instance();
				$controllers->load->model('../controllers/Solicitacao');
				
				return $controllers->Solicitacao->getTodosHorariosMedico($chaveConsulta,'json');
				
			} 
			
			function getChaveConsulta() {
				

				$controllers =& get_instance();
				$controllers->load->model('../controllers/Soap');
				
				$idMedico = $controllers->Soap->obterIdMedico();
				
				if ($idMedico > 0) {
					
					$chave = $controllers->Soap->gerarHash($idMedico, 'string');
				
					exit($chave);
								
				}


			}
	

	}
?>