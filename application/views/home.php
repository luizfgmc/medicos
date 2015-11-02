
<section class="bemVindo">
    <div class="containerCenter fullSiteSize">
        <h2>BEM VINDO AO AMIGO MÉDICO</h2>
    </div>
</section>

<section class="medicoInstituicao">
    <div class="containerCenter fullSiteSize">
        <div class="conteudoMedicoInstituicao">
            <div class="imagemMedicoInstituicao">
                <img src="<?php echo base_url() ?>assets/images/medicoHome.jpg" />
            </div>
            <div class="escolhaMedicoInsituicao">
                <h3> Você é medico ou instituição ?</h3>
                <?php
                if (!empty($this->session->userdata('erroLogin'))) {
                    echo '<p class="dadosInvalidos">Dados Inválidos</p>';
                    $this->session->unset_userdata('erroLogin');
                }
                ?>

                <div class="containerEscolha">
                    <div class="containerMedico">
                        <a href="#"><div class="trianguloEsquerda"></div></a>
                        <a href="#" id="mostraLoginMedico"> Médico </a>
                    </div>
                    <div class="containerInstituicao">
                        <a href="#" id="mostraLoginInstituicao">  Instituicao</a>
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
                            <div class="itemForm itemCadastrar">
                                <a href="<?php echo base_url(); ?>medico/index">
                                    Cadastrar
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
                                <a href="<?php echo base_url(); ?>medico/index">
                                    Cadastrar
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
<section class="estatistcasHome">
    <div class="containerCenter fullSiteSize">
        <h3> NO MÊS DE OUTUBRO </h3>
        <div class="estatisticas">
            <div class="itemEstatisticas">
                165 consultas
            </div>
            <div class="itemEstatisticas">
                37 médicos
            </div>
            <div class="itemEstatisticas">
                5 instituições
            </div>
        </div>
    </div>
</section>