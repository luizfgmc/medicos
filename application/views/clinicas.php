<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/solicitacoes/solicitacoes.css" />
<section class="mainContent">
    <section class="containerSolicitacoes">
        <div class="containerCenter fullSiteSize">
            <div class="halfSize">
                <div class="containerListaSolicitacoes">
                    <h2>Clinicas</h2>
                    <div class="cabecalhoListaSolicitacoes">
                        <span class="nomePaciente">Nome</span>
                        <span class="horarioSugerido">Endereço</span>
                        <span class="saldo">Ações</span>
                    </div>
                    <div class="containerItensSolicitacao">
                        <?php
                        foreach ($query as $k) {
                            ?>
                            <div class="itemSolicitacao">
                                <?php
                                echo'<span class="nomePaciente">' . ($k->nome) . '</span>';
                                //echo($k->telefone . "<br/>");


                                echo '<span class="horarioSugerido">' . ($k->bairro).'<br />';
                                echo($k->cidade).'<br />';
                                 echo($k->endereco).'<br />';
                                echo($k->end_numero).' ';
                                echo($k->end_complemento) . '</span>';
                                //echo($k->uf . "<br/>");
                                //echo($k->cep . "<br/>");
                                ?>
                                <span class="saldo">
                                    <a href="<?php echo base_url() . "clinica/editarClinica/" . $k->id ?>"> editar </a>
                                    <a href="<?php echo base_url() . "clinica/excluirClinica/" . $k->id ?>"> excluir </a>
                                </span>
                                <?php
                                ?>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</section>


