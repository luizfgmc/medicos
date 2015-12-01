<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'captcha'));
    }

    public function index() {

        $dados = array();


        if ($this->session->userdata('cont_captcha') >= 3) {
            $vals = array(
                'word' => 'teste',
                'img_path' => './captcha/',
                'img_url' => base_url() . "captcha/",
                'font_path' => './path/to/fonts/texb.ttf',
                'img_width' => '150',
                'img_height' => 40,
                'expiration' => 7200
            );

            $cap = create_captcha($vals);
            $dados['image'] = $cap['image'];
        }

        $this->load->view('layout/header_home');
        $this->load->view('home', $dados);
        $this->load->view('layout/footer_home');
    }

    public function criarCaptcha() {

        $vals = array(
            'word' => 'teste',
            'img_path' => './captcha/',
            'img_url' => base_url() . "captcha/",
            'font_path' => './path/to/fonts/texb.ttf',
            'img_width' => '300',
            'img_height' => 80,
            'expiration' => 7200
        );

        $cap = create_captcha($vals);
        $this->session->set_userdata('captcha', $cap['word']);

        $this->load->view('captcha', $cap);
    }

    public function validarCaptcha() {

        if ($this->input->post('captcha') == $this->session->userdata('captcha')) {
            //redirect(base_url('home'));
            redirect(base_url('home'));
        } else {

            $this->criarCaptcha();
        }
    }

}

?>