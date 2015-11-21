<?php

class Acesso extends CI_Controller {

    function __construct() {

        parent:: __construct();
        $this->load->helper('captcha');
        
    }



    public function index() {

         $this->load->view('login_medico');
    }

    public function logarMedico() {

       
        $email = $this->input->post('email');

        $senha = sha1($this->input->post('senha'));

        $this->load->model('medicoModel', 'mm');
        $data = $this->mm->autenticar($email);
        
        $cont = 0;

        if($this->session->userdata('cont_captcha') == 3){

   
            $vals = array(
                
            'word'=>'',   
            'img_path' => './captcha/',
            'img_url' => base_url()."captcha/",
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => '300',
            'img_height' => 80,
            'expiration' => 7200
           
           );

            $cap = create_captcha($vals);
            echo $cap['image'];

        }

        if ($data != null) {

                if ($data[0]->tipo == 'M' && $data[0]->password_hash == $senha) {

                    $idMedico = $this->mm->buscarIdMedico($data[0]->id);


                    $arrayMedico = array(
                        'tipo' => $data[0]->tipo,
                        'email' => $data[0]->email,
                        'id_usuario' => $data[0]->id,
                        'id_medico' => $idMedico[0]->id,
                    );

                    $this->session->set_userdata('medico', $arrayMedico);

                    redirect(base_url('medico/solicitacoes'));
                } else {

                   
                    $this->criarCaptcha();
              
                 }
    
        } else {


                
                

               $this->criarCaptcha(); 
            //$this->session->set_userdata('erroLogin', '1');
            //redirect(base_url('home'));
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
                    'tipo' => $data[0]->tipo,
                    'email' => $data[0]->email,
                    'id_usuario' => $data[0]->id,
                    'id_instituicao' => $idInstituicao[0]->id,
                );

                $this->session->set_userdata('instituicao', $arrayInstituicao);


                redirect(base_url('instituicao'));
            } else {
                $this->session->set_userdata('erroLogin', '1');
                redirect(base_url('home'));
            }
        } else {
            $this->session->set_userdata('erroLogin', '1');
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


    
    public function criarCaptcha(){

         $vals = array(
                
            'word'=>'',   
            'img_path' => './captcha/',
            'img_url' => base_url()."captcha/",
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => '300',
            'img_height' => 80,
            'expiration' => 7200
           
           );

            $cap = create_captcha($vals);
            $this->session->set_userdata('captcha', $cap['word']);
            
            $this->load->view('captcha', $cap);

            
            
        }

    public function validarCaptcha(){

             if($this->input->post('captcha') == $this->session->userdata('captcha')){
                 //redirect(base_url('home'));
                redirect(base_url('home'));
             }else{

                $this->criarCaptcha();

             }
                


        }
       





}

?>