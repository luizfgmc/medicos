<div class="containerCenter fullSiteSize">	
    <form id="login_medico"  method="post" action="<?php echo base_url(); ?>acesso/logarMedico2">
        <div class="containerChallenge">
            <h2>Posso fazer mais uma pergunta?</h2>
            <div class="perguntaChallenge">
                <label> Qual o dia de hoje? </label>
            </div>
            <?php
            foreach ($dias as $dia):
                ?>
                <div class="itemFormChallenge">
                    <input type="radio" name="dia" value=<?php echo($dia * $hora) ?>> <?php echo($dia) ?>
                </div>
                <?php
            endforeach;
            ?>
            </br></br>
            <input type="submit" value="Logar" class="input_submit" id="enviar"/>
        </div>
    </form>
</div>