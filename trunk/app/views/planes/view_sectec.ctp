<?php
    echo $javascript->link('jquery.biggerlink.min.js');
?>
<div id="tabs-1">  
        <?php
        foreach($planes as $plan){
        ?>
        <div class="plan_item">
            <h2 style="float:left">
                <?php echo $html->link(
                        $plan['Plan']['EstructuraPlan']['Etapa']['name'] . " - " . $plan['Plan']['nombre'],
                        array('controller'=> 'planes', 'action'=>'view', $plan['Plan']['id']),
                        null,null,false);
                ?>
            </h2>
            <table width="100%"border="2" cellpadding="2" cellspacing="0">
            <tr>
                <th>A�o</th>
                <th>Matr�cula</th>
                <th>Secciones</th>
                <th>Horas Taller</th>
            </tr>
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
