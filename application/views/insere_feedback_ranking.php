
<div class="">
    <form action="<?php echo base_url(); ?>feedback/salva_feedback" method="post">
        <input type="hidden" value="<?php echo  $id_solicitacao; ?>" name="id_solicitacao" >
        <select name="ranking">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
        </select>
        <input type="submit" value="enviar" />
    </form>
</div>