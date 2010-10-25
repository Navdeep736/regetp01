<?php
    echo $javascript->link('jquery.biggerlink.min.js');
?>
<div id="tabs-oferta" style="margin-bottom: 1em; padding: 10px">
    <div style="margin-bottom:20px">
        <span>Buscar: </span><input id="buscador" type="text"/>
    </div>
    <?php
    $i = 0;
    if ((isset($planes)) && (count($planes) > 0)){
        foreach ($planes as $plan):
            if(count($plan['Anio']) > 0){
            $class = null;
            if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
            }
        ?>
            <!--<div style="border:1px solid #E0EAEF;margin-bottom:15px;padding:5px;cursor:pointer">-->
            <div class="plan_item">
                <div class="plan_title">
                    <?php echo $html->link($plan['Plan']['nombre'], array('action'=>'view', $plan['Plan']['id'])); ?>
                </div>
                <div>
                    Sector: <span class="plan_name"><?php echo $plan['Sector']['name']; ?></span>
                </div>
                <div>
                    Matricula: <?php echo $plan['Anio'][0]['matricula']; ?>
                </div>
            </div>
    <?php }
    endforeach;
    } else {
    ?>
            <div>
                <?php $a�o_actual = date('Y',strtotime('now'));?>
                <?php if($datoUltimoCiclo['max_ciclo'] != $a�o_actual && $current_ciclo == $a�o_actual):?>
                        <p class='msg-atencion'>La Instituci&oacute;n no presenta actualizaciones para este a�o</p>
                <?php else:?>
                        <p class='msg-atencion'>No se obtuvieron resultados</p>
                <?php endif;?>
            </div>
    <?} ?>
</div>
<script type="text/javascript">
    jQuery('#tabs-1 .plan_item').biggerlink();

    jQuery('#buscador').live('keyup', function() {
        jQuery('.plan_item .plan_title a').each(function () {
            if(jQuery(this).html().toLowerCase().replace(/^\s+|\s+$/g,"").indexOf(jQuery('#buscador').val().replace(/^\s+|\s+$/g,"").toLowerCase()) >= 0 ){
                jQuery(this).parent().parent().show();
            }
            else{
                jQuery(this).parent().parent().hide();
            }
        });
    });
</script>