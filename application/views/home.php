<!---->
<!--<section class="bemVindo">-->
<!--    <div class="containerCenter fullSiteSize">-->
<!--        <h2>BEM VINDO AO AMIGO MÉDICO</h2>-->
<!--    </div>-->
<!---->
<!--</section>-->
<section class="bannerHome">
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
            <img src="<?php echo base_url() ?>assets/images/banner_home.png" data-thumb="<?php echo base_url() ?>assets/images/banner_home.jpg" alt="" />
        </div>
    </div>
</section>
<section class="medicoInstituicao">
    <div class="containerCenter fullSiteSize">
        <div class="conteudoMedicoInstituicao">
            <div class="imagemMedicoInstituicao">
                <img src="<?php echo base_url() ?>assets/images/medicoHome.jpg" />
            </div>
            <div class="escolhaMedicoInsituicao" id="escolhaMedicoInsituicao">
                <h3> Você é medico ou instituição ?</h3>
                <?php
                if (!empty($this->session->userdata('erroLogin'))) {
                    echo $this->session->userdata('erroLogin');
                    $this->session->unset_userdata('erroLogin');
                    $this->session->unset_userdata('medico');
                }
                ?>  
                <div class="containerEscolha">
                    <div class="containerMedico">
                        <a href="#escolhaMedicoInsituicao"><div class="trianguloEsquerda"></div></a>
                        <a href="#escolhaMedicoInsituicao" id="mostraLoginMedico"> Médico </a>
                    </div>
                    <div class="containerInstituicao">
                        <a href="#escolhaMedicoInsituicao" id="mostraLoginInstituicao">  Instituicao</a>
                        <a href=""><div class="trianguloDireita"></div></a>
                    </div>
                </div>
                <div class="loginMedico">
                    <form id="login_medico"  method="post" action="<?php echo base_url(); ?>acesso/logarMedico">
                        <div class="containerFormLogin">
                            <div class="itemForm">
                                <label> Login </label>
                                <input type="text" name="email" id="email"/>
                            </div>
                            <div class="itemForm">
                                <label> Senha </label>
                                <input type="password" name="senha" id="senha"/>
                            </div>
                            <?php if ($this->session->userdata('cont_captcha') >= 3) { ?>
                                <div class="itemForm captcha">
                                    <?php
                                    $this->load->view('captcha');
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="itemForm itemCadastrar">
                                <a href="<?php echo base_url(); ?>cadastroMedico">
                                    Cadastrar
                                </a>
                                <a href="#escolhaMedicoInsituicao" class="ocultarLogin">
                                    Cancelar
                                </a>
                            </div>
                            <div class="itemForm">
                                <input type="submit" value="Logar" class="input_submit" id="enviar"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="loginInstituicao">
                    <form id="login_medico"  method="post" action="<?php echo base_url(); ?>acesso/logarInstituicao">
                        <div class="containerFormLogin">
                            <div class="itemForm">
                                <label> Login </label>
                                <input type="text" name="email" id="email"/>
                            </div>
                            <div class="itemForm">
                                <label> Senha </label>
                                <input type="password" name="senha" id="senha"/>
                            </div>
                            <div class="itemForm itemCadastrar">
                                <a href="#escolhaMedicoInsituicao" class="ocultarLogin">
                                    Cancelar
                                </a>
                            </div>
                            <div class="itemForm">
                                <input type="submit" value="Logar" class="input_submit" id="enviar"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="imagemMedicoInstituicao">
                <img src="<?php echo base_url() ?>assets/images/instituicaoHome.jpg" />
            </div>
        </div>
    </div>
</section>
<div class="fullSiteSize containerCenter">
    <section class="listaRankingMedicos ">
        <h2>Veja quem são dos destaques de doação e apoio ao nosso trabalho:</h2>
        <div class="topMensal">
            <div class="conteudoRanking">
                <h3>
                    <img src="<?php echo base_url() ?>assets/images/ranking_medalha.jpg" >
                    TOP MENSAL :
                </h3>
                    <div class="listaRanking">
                        <?php $contador=0; foreach($ranking as $rank){
                            $contador++;
                            ?>
                            <div class="itemsCamposRanking">
                                <div class="numeroRanking">
                                    <?=$contador;?>
                                </div>
                                <div class="nomeRanking">
                                    <?=$rank->nome_medico;?>
                                </div>
                                <div class="especialidadeRanking">
                                    <?=$rank->descricao;?>
                                </div>
                                <div class="ranking">
                                    <?=$rank->ranking;?>
                                </div>

                            </div>
                        <?php } ?>  

                </div>
            </div>
        </div>
        <div class="topAno">
            <div class="conteudoRanking">

                <h3>
                    <img src="<?php echo base_url() ?>assets/images/ranking_trofeu.jpg" >
                    TOP 2016 :
                </h3>
                <div class="listaRanking">
                    <?php $contador=0; foreach($ranking as $rank){
                    $contador++;
                    ?>
                    <div class="itemsCamposRanking">
                        <div class="numeroRanking">
                            <?=$contador;?>
                        </div>
                        <div class="nomeRanking">
                            <?=$rank->nome_medico;?>
                        </div>
                        <div class="especialidadeRanking">
                            <?=$rank->descricao;?>
                        </div>
                        <div class="ranking">
                            <?=$rank->ranking;?>
                        </div>

                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>
</div>