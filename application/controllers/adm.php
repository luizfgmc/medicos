<?php
	
	class Adm extends CI_Controller{

		function __construct(){

			parent::__construct();
			$this->loginadm->valida_sessao_adm();

		}


		


		public function index(){

			$this->load->view('index_adm.php');
		}



		public function cadastrarinstituicao() {

        $this->load->model('estadosModel');
        $estado['estados'] = $this->estadosModel->getInfoEstados();
        $this->load->view('layout/header');
        $this->load->view('cadastrar_instituicao', $estado);
        $this->load->view('layout/footer');
   		
   		 }

		public function instituicoes() {

        $this->load->model('instituicaoModel', 'im');
        $data['query'] = $this->im->listaInstituicoes();


        $this->load->view('instituicoes', $data);
    }

    public function insereInsituicao() {

        $this->load->model('instituicaoModel', 'im');

        $data = $_POST;

        $this->load->library('Form_validation');
        $this->form_validation->set_rules('nomeInstituicao', 'Nome', 'trim|required');
        $this->form_validation->set_rules('cnpjInstituicao', 'CNPJ', 'trim|required|valida_cnpj');
        $this->form_validation->set_rules('responsavelInstituicao', 'Responsavel', 'trim|required');
        $this->form_validation->set_rules('enderecoInstituicao', 'Endereco', 'trim|required');
        $this->form_validation->set_rules('end_numeroInstituicao', 'Numero', 'trim|required');
        $this->form_validation->set_rules('bairroInstituicao', 'Bairro', 'trim|required');
        $this->form_validation->set_rules('cidadeInstituicao', 'Cidade', 'trim|required');
        $this->form_validation->set_rules('ufInstituicao', 'Estado', 'trim|required');
        $this->form_validation->set_rules('cepInstituicao', 'CEP', 'trim|required');
        $this->form_validation->set_rules('telefoneInstituicao', 'Telefone', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {

            $arrayInstiuicao = array(
                "nome" => $data['nomeInstituicao'],
                "cnpj" => str_replace(".","",$data['cnpjInstituicao']),
                "responsavel" => $data['responsavelInstituicao'],
                "endereco" => $data['enderecoInstituicao'],
                "end_numero" => $data['end_numeroInstituicao'],
                "complemento" => $data['complementoInstituicao'],
                "bairro" => $data['bairroInstituicao'],
                "cidade" => $data['cidadeInstituicao'],
                "uf" => $data['ufInstituicao'],
                "cep" => str_replace(".","",$data['cepInstituicao']),
                "telefone" => str_replace(".","",$data['telefoneInstituicao']),
                "status" => $data['statusInstituicao'],
                "usuario_id" => 59,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s"),
            );

            $this->im->insereInstituicao($arrayInstiuicao);
            redirect("Instituicao/instituicoes");
        }
    }

    public function editarInstituicao($id) {

        $this->load->model('instituicaoModel', 'im');
        $data['query'] = $this->im->editarInstituicao($id);
        $this->load->model('estadosModel');
        $estado = $this->estadosModel->getInfoEstados();
        $data['estados'] = $estado;

        $this->load->view('editar_instituicao', $data);
    }

    public function editarSalvarInstituicao($id) {

        $this->load->model('instituicaoModel', 'im');

        $data = $_POST;

        $arrayInstiuicao = array(
            "nome" => $data['nomeInstituicao'],
            "cnpj" => str_replace(".","",$data['cnpjInstituicao']),
            "responsavel" => $data['responsavelInstituicao'],
            "endereco" => $data['enderecoInstituicao'],
            "end_numero" => $data['end_numeroInstituicao'],
            "complemento" => $data['complementoInstituicao'],
            "bairro" => $data['bairroInstituicao'],
            "cidade" => $data['cidadeInstituicao'],
            "uf" => $data['ufInstituicao'],
            "cep" => str_replace(".","",$data['cepInstituicao']),
            "telefone" => str_replace(".","",$data['telefoneInstituicao']),
            "status" => $data['statusInstituicao'],
            "usuario_id" => 59,
            "created_at" => date("Y-m-d H:i:s"),
            "updated_at" => date("Y-m-d H:i:s"),
        );

        $this->im->editarSalvarInstituicao($arrayInstiuicao, $id);
        redirect("adm/instituicoes");
    }

    public function deletaInstituicao($id) {

        $this->load->model('instituicaoModel', 'im');
        $this->im->deletaInstituicao($id);
        redirect("Instituicao/instituicoes");
    }

	   public function listarMedicos() {
        
        $this->load->model("MedicoModel");
        $listaDeMedicos = $this->MedicoModel->listarNomeTodosMedicos();
        $dadosView = array('listaDeMedicos' => $listaDeMedicos);
        
        
        $this->load->view('lista_medicos', $dadosView);
        
    }
 public function excluirMedico($idMedico,$idUsuario) {
         
         $id = $this->session->userdata('medico');    
         
        $this->load->model("MedicoModel");
        $this->load->model("UsuarioModel");
        $this->MedicoModel->excluirMedico($id['id_medico']);
        $this->UsuarioModel->excluirUsuario($id['id_usuario']);
        redirect('medico/listarMedicos');
    }


    }




?>