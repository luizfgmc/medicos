<?php
	
	class Acesso extends CI_Controller{
		

		function __construct(){

			parent:: __construct();

		}


		public function index(){

			$this->load->view('login_medico');

		}

		 public function logarMedico(){

		        $email = $this->input->post('email');
		        $senha = sha1($this->input->post('senha'));

		        $this->load->model('medicoModel','mm');
		        $data = $this->mm->autenticar($email);


		        if($data != null){

		            if($data[0]->tipo == 'M' && $data[0]->password_hash == $senha){


		              		$arrayMedico = array(

		                    'tipo'=>$data[0]->tipo,
		                    'email'=>$data[0]->email,
		                    'id'=>$data[0]->id,
		                ); 

		                $this->session->set_userdata('medico', $arrayMedico);

		                redirect(base_url('medico'));

		            }else{

		            	 echo("dados inválidos");
		            }


		        }else{

		            echo("dados inválidos");
		        }



		    }




		 public function logarInstituicao(){

		        $email = $this->input->post('email');
		        $senha = sha1($this->input->post('senha'));

		        $this->load->model('instituicaoModel','im');
		        $data = $this->im->autenticar($email);

		        if($data != null){


		            if($data[0]->tipo == 'I' && $data[0]->password_hash == $senha){


		               	$arrayInstituicao = array(

		                    'tipo'=>$data[0]->tipo,
		                    'email'=>$data[0]->email,
		                    'id'=>$data[0]->id,
		                ); 

		                $this->session->set_userdata('instituicao', $arrayInstituicao);


		               redirect(base_url('instituicao'));

		            
 					}else{

		            	 echo("dados inválidos");
		            }


		        }else{

		            echo("dados inválidos");
		        }




		    }



		    public function logoff(){

		    	$this->session->sess_destroy();
		    }

	}


?>