
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
                                <!--<a href="<?php echo base_url(); ?>medico/">
                                    Cadastrar
                                </a>    -->

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
        <h3> NO MÊS DE DEZEMBRO </h3>
        <div class="estatisticas">
            <div class="itemEstatisticas">
                5 consultas
            </div>
            <div class="itemEstatisticas">
                17 médicos
            </div>
            <div class="itemEstatisticas">
                1 instituição
            </div>
        </div>
    </div>
</section>