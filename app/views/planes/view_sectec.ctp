<div id="tabs-1">
        
        <?php
        foreach($planes as $plan){
        ?>
        <div style="border:1px solid #E0EAEF;margin-bottom:15px;padding:5px">
        <h2>
            <?php echo $plan['EstructuraPlan']['Etapa']['name']?> - <?php echo $plan['Plan']['nombre']?>
        </h2>
        <?php echo $html->link(
                    $html->image("modify.png", array("alt" => "Editar")),
                    array('controller'=> 'anios', 'action'=>'editCiclo', $plan['Plan']['id'], $ciclo),
                    array(
                        'style'=> 'margin-left: 10px;',
                        'onclick'=>'agregar_datos_anios(this);return false;',
                        'class'=>'ajax-link'),null,false);
        ?>
        <?php
         if(count($plan['Anio'])){
        ?>
        <table border="2" cellpadding="2" cellspacing="0">
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
        <?php
        }
        else{
        ?>
        <cite>No se ingresaron a�os para el Plan</cite>
        <?php
        }?>
        </div>
        <?
        }
        ?>
        
</div>