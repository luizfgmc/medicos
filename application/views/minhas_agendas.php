<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/forms.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/solicitacoes/solicitacoes.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fullcalendar.css" />
<script src='<?php echo base_url() ?>assets/js/moment.min.js'></script>
<script src='<?php echo base_url() ?>assets/js/fullcalendar.js'></script>

<section class="mainContent">
    <section class="containerSolicitacoes">
        <div class="containerCenter fullSiteSize">
            <div class="halfSize">
                <div class="containerListaSolicitacoes">
                    <h2>Minhas Agendas </h2>
   
                    <div class="containerItensSolicitacao">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<script>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '<?php echo date('Y-m-d'); ?>',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [

         <?php
           foreach ($query as $k) {
            echo "{ title:'".$k->nome."' , start:'".date('Y/m/d', strtotime($k->data_emissao))."' },";
              
          }
        ?>

            ],



            });
        
    });


</script>

