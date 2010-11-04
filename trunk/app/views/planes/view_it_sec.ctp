
<div id="tabs-oferta-it-sec" class="oferta-contanier">
        <?php
        foreach($planes as $plan) {
            if (count($plan['Anio']))
            {
            ?>
            <div class="plan_item">
                <table class="tabla_plan" width="100%" border="2" cellpadding="2" cellspacing="0">
                    <caption>
                        <?php echo $html->link(
                        $plan['Plan']['nombre'],
                        array('controller'=> 'planes', 'action'=>'view', $plan['Plan']['id']),
                        null,null,false);
                        ?>

                        <?php
                        if($ciclo == 0){
                            $primer_anio = current($plan['Anio']);
                            echo " (" . $primer_anio['ciclo_id'] . ")";
                        }
                        ?>
                        <span style="float:right;"><?php echo $html->link("ver m�s",
                            array('controller'=> 'planes', 'action'=>'view', $plan['Plan']['id']),
                            null,null,false);
                        ?></span>
                    </caption>
                    <thead>
                        <tr>
                            <th>A�o</th>
                            <th>Etapa</th>
                            <th>Matr�cula</th>
                            <th>Secciones</th>
                            <th>Horas Taller</th>
                        </tr>
                    </thead>
                    <?php
                    foreach($plan['Anio'] as $anio){
                    ?>
                    <tr>
                        <td><?php echo $anio['anio']?>�</td>
                        <td><?php echo "";?></td>
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
        }
        ?>
</div>
