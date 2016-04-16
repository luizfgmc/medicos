    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/solicitacoes/solicitacoes.css" />
    <section class="mainContent">
        <section class="containerSolicitacoes">
            <div class="containerCenter fullSiteSize">
                <div class="halfSize">
                    <div class="containerListaSolicitacoes">
                        <h2>Lista de Apoiadores</h2>

                         <!-- <a href="<?php echo base_url() ?>paciente/"> Inserir Paciente </a> -->
                        
                        <div class="containerItensSolicitacao">
                        <div class="cabecalhoListaSolicitacoes">
                            <span class="nomePacienteLista">Nome</span>
                            <span class="enderecoLista">Email</span>
                        </div>
                            <?php
                            foreach ($query as $k) {
                                ?>
                                <div class="itemSolicitacao">
                                    <?php
										echo '<span class="nomePacienteLista">'.($k->nome . "<br/>").'</span>';
										echo '<span class="enderecoLista"> ' .($k->email . "<br/>");
                                    ?>
                                    <a href="<?php echo base_url() . "apoiador/editarApoiador/" . $k->id_apoiador ?>"> Editar </a>
                                    <a href="<?php echo base_url() . "apoiador/deletarApoiador/" . $k->id_apoiador ?>"> Excluir </a>
									</span>
                                </span>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </section>
