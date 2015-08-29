<html>
    <head></head>
    <body>
        <section class="listdeMedicos">
            <?php
            foreach ($listaDeMedicos as $medico):
                ?>
                <div class="itemListaMedicos">
                    <div>
                        <span><?= $medico->nome; ?></span>
                        <span><a href="<?php echo base_url() . 'medico/visualizaEditaMedicoMedicos/' .$medico->id.'/'.$medico->usuario_id; ?>/">Editar Medico</a></span>
                        <span><a href="<?php echo base_url() . 'medico/excluirMedico/' .$medico->id.'/'.$medico->usuario_id; ?>">Excluir Medico</a></span>
                    </div>
                </div>
                <?php
            endforeach;
            ?>
        </section>
    </body>
</html>