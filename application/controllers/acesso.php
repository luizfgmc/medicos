<?php

class Acesso extends CI_Controller {

    function __construct() {

        parent:: __construct();

    }
    
    public function index() {

        $this->load->view('login_medico');
    }

    public function logarMedico2() {

        $dia = $this->input->post('dia');

        if ($dia == date("d")) {
            redirect(base_url('medico/solicitacoes'));
        } else {
            $this->logoffResponse();
        }

    }

    function setErrorLogin()
    {
        $this->session->set_userdata('erroLogin',"<div class='retornoLoginInvalido'>Login Invalido, tente novamente.</div>");
    }

    public function logarMedico() {
        $email = $this->input->post('email');
        $senha = sha1($this->input->post('senha'));
        $this->load->model('UsuarioModel');
        $this->load->model('medicoModel', 'mm');
        $data = $this->UsuarioModel->autenticar($email);
        if ($data != null) {
            if ($data[0]->tipo == 'M' && $data[0]->password_hash == $senha) {
                $idMedico = $this->mm->buscarIdMedico($data[0]->id);
                $arrayMedico = array (
                    'nome' => $idMedico[0]->nome_medico,
                    'tipo' => $data[0]->tipo,
                    'email' => $data[0]->email,
                    'id_usuario' => $data[0]->id,
                    'id_medico' => $idMedico[0]->id,
                );
                $this->session->set_userdata('medico', $arrayMedico);
                redirect(base_url('medico/chares'));
            } else {
                $this->setErrorLogin();
                redirect(base_url('home'));
            }
        } else {
            $this->setErrorLogin();
            redirect(base_url('home'));
        }
    }

    public function logarInstituicao() {
        $this->load->view('login');
        $email = $this->input->post('email');
        $senha = sha1($this->input->post('senha'));

        $this->load->model('instituicaoModel', 'im');
        $data = $this->im->autenticar($email);
        if ($data != null) {
            if ($data[0]->tipo == 'I' && $data[0]->password_hash == $senha) {
                $idInstituicao = $this->im->buscarIdInstituicao($data[0]->id);
                $arrayInstituicao = array(
                    'nome'=>$idInstituicao[0]->nome,
                    'tipo' => $data[0]->tipo,
                    'email' => $data[0]->email,
                    'id_usuario' => $data[0]->id,
                    'id_instituicao' => $idInstituicao[0]->id,
                );

                $this->session->set_userdata('instituicao', $arrayInstituicao);
                redirect(base_url('instituicao'));

            } elseif ($data[0]->tipo == 'A' && $data[0]->password_hash == $senha) {

                $this->load->model('apoiadorModel', 'am');
                $apoiador = $this->am->autenticar($data[0]->email);

                $arrayInstituicao = array(
                    'nome'=>$apoiador[0]->nome,
                    'tipo' => $apoiador[0]->tipo,
                    'email' => $apoiador[0]->email,
                    'id_usuario' => $apoiador[0]->usuario_id,
                    'id_instituicao' => $apoiador[0]->instituicao_id,
                );
                $this->session->set_userdata('instituicao', $arrayInstituicao);
                redirect(base_url('instituicao'));

            } else {

                setErrorLogin();
                redirect(base_url('home'));
            }
        } else {
            setErrorLogin();
            redirect(base_url('home'));
        }
    }

    public function logarAdm() {

        $email = $this->input->post('email');
        $senha = sha1($this->input->post('senha'));

        $this->load->model('admModel', 'am');
        $data = $this->am->autenticar($email);

        if ($data != null) {

            if ($data[0]->tipo == 'A' && $data[0]->password_hash == $senha) {


                $arrayAdm = array(
                    'tipo' => $data[0]->tipo,
                    'email' => $data[0]->email,
                    'id_usuario' => $data[0]->id,
                );

                $this->session->set_userdata('adm', $arrayAdm);

                redirect(base_url('adm'));

            } else {
                $this->session->set_userdata('erroLogin', '1');
                redirect(base_url('home'));
            }
        } else {
            $this->session->set_userdata('erroLogin', '1');
            redirect(base_url('home'));
        }
    }

    public function logoff() {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function logoffResponse()
    {
        $this->session->set_userdata('erroLogin',"<div class='retornoLoginInvalido'>Login Invalido, tente novamente.</div>");
        redirect('home');
    }

}

