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
                                echo'<span class="horarioSugerido">' .($k->endereco). ', ';
                                echo($k->end_numero). '<br />';
                                echo($k->end_complemento) .'<br />' ;
                                echo ($k->bairro).'<br />';
                                echo($k->cidade) .'<br />';
                                echo(mascara_string("##.###-###",$k->cep) . '</span>');
                                //echo($k->uf . "<br/>");
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