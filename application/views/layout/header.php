<html>
    <head>
        <meta charset="utf-8" />
        <link href='https://fonts.googleapis.com/css?family=Actor' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css" />
        <script src="<?php echo base_url() ?>assets/js/jquery1.9.js"></script>
        <script src="<?php echo base_url() ?>assets/js/validate.js"></script>
        <script src="<?php echo base_url() ?>assets/js/main.js"></script>
        <script src="<?php echo base_url() ?>assets/js/medico.js"></script>
    </head>
    <header class="mainHeader">
        <div class="containerCenter fullSiteSize">
            <section class="containerItemsHeader">
                <div class="iconMenuTop">
                    <a href="">
                        <img src="<?php echo base_url() ?>assets/images/menu_topo.png" />
                    </a>	
                    <?php
                    $arrayLoginMedoc = $this->session->userdata('instituicao');

                    if (empty($arrayLoginMedoc)) {

                        $this->load->view('layout/menu_medico');
                    } else {

                        $this->load->view('layout/menu_instituicao');
                    }
                    ?>
                </div>
                <div class="alertTop">
                    <a href="">
                        <img src="<?php echo base_url() ?>assets/images/alerta_topo.png" />
                    </a>
                    <div class="reminderTop">  
                        <div class="numeroNotificacoes">
                            5 solicitações em espera
                        </div>
                        <div class="notificacaoTopo">
                            <p>
                                APAE - Belo Horizonte
                                Césario José Oliveira
                                28/09 | Quinta-Feira
                            </p>
                            <span class="analisarNotificacaoTopo">
                                <a href="">
                                    Analisar
                                </a>
                            </span>

                        </div>
                        <div class="notificacaoTopo">
                            <p>
                                APAE - Belo Horizonte
                                Césario José Oliveira
                                28/09 | Quinta-Feira
                            </p>
                            <span class="analisarNotificacaoTopo">
                                <a href="">
                                    Analisar
                                </a>
                            </span>

                        </div>
                    </div>
                </div>
                <div class="logoMedicoAmigoTop">
                    <a href="">
                        <img src="<?php echo base_url() ?>assets/images/logo_topo.png" />
                    </a>	
                    <span> | amigo médico</span>

                </div>
                <div class="medicoLoged">
                    <?php
                    if (!empty($arrayLoginMedoc)) {
                        ?>
                        <span> <a href="<?php echo base_url() ?>instituicao/" ><?php echo $arrayLoginMedoc['nome']?>  </a> </span>
                    <?php
                    }else{
                        $arrayLoginMedoc = $this->session->userdata('medico');
                    ?>
                 <span> <a href="<?php echo base_url() ?>profissional/visualizaEditaMedicoProfissional" ><?php echo $arrayLoginMedoc['nome']?> </a> </span>
                        <?php
                        }
                        ?>
                    <a style="position:relative; left:70px;" href="<?php echo base_url() ?>acesso/logoff" > Sair </a>
                </div>
                <!-- <div class="configTop">
                     <a href="">
                         <img src="<?php echo base_url() ?>assets/images/conf_topo.png" />
                     </a>
                     <div class="menuConfigTop">  
                     </div>
                 </div> -->
        </div>
    </section>
</header>
