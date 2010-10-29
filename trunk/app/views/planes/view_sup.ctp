<?php
    echo $javascript->link('jquery.biggerlink.min.js',false);
?>
<div id="tabs-1">  
        <?php
        foreach($planes as $plan) {
            if (count($plan['Anio']))
            {
            ?>
            <div class="plan_item">
                <span style="float:right;"><?php echo $html->link("ver m�s",
                            array('controller'=> 'planes', 'action'=>'view', $plan['Plan']['id']),
                            null,null,false);
                      ?>
                </span>
                <table class="tabla_plan" width="100%"border="2" cellpadding="2" cellspacing="0">
                    <caption class="plan_title">
                        <?php echo $html->link(
                                $plan['Plan']['nombre'],
                                array('controller'=> 'planes', 'action'=>'view', $plan['Plan']['id']),
                                null,null,false);
                        ?>
                    </caption>
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
                    <td><?php echo $anio['anio']?>�</td>
                    <td><?php echo $anio['matricula']?></td>
                    <td><?php echo $anio['secciones']?></td>
                    <td><?php echo $anio['hs_taller']?></td>
                </tr>
                <?php
                }?>
             </table>
             </div>
            <br />
            <?php
            }
        }
        ?>
</div>
<script type="text/javascript">
    jQuery('#tabs-1 .plan_item').biggerlink();
</script>
