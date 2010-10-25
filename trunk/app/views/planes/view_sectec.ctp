<?php
    echo $javascript->link('jquery.biggerlink.min.js');
?>
<div id="tab_oferta">
        <?php
        foreach($planes as $plan){
        ?>
        <div class="plan_item">
            
            <table class="tabla_plan" width="100%"border="2" cellpadding="2" cellspacing="0">
                <caption>
                    <?php echo $html->link(
                        $plan['Plan']['EstructuraPlan']['Etapa']['name'] . " - " . $plan['Plan']['nombre'],
                        array('controller'=> 'planes', 'action'=>'view', $plan['Plan']['id']),
                        null,null,false);
                    ?>
                    <span style="float:right;"><?php echo $html->link("ver m�s",
                        array('controller'=> 'planes', 'action'=>'view', $plan['Plan']['id']),
                        null,null,false);
                    ?></span>
                </caption>
                <thead>
                    <tr>
                        <th>A�o</th>
                        <th>Matr�cula</th>
                        <th>Secciones</th>
                        <th>Horas Taller</th>
                    </tr>
                </thead>
            <?php
            foreach($plan['Anio'] as $anio){
            ?>
            <tr>
                <td><?php echo $anio['EstructuraPlanesAnio']['nro_anio']?>�</td>
                <td><?php echo $anio['matricula']?></td>
                <td><?php echo $anio['secciones']?></td>
                <td><?php echo $anio['hs_taller']?></td>
            </tr>
            <?php
            }?>
         </table>
         </div>
        <?php
        }
        ?>
</div>
<script type="text/javascript">
    jQuery('#tabs-1 .plan_item').biggerlink();
</script>
