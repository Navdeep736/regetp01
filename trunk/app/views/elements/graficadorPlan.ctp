<?php
$j = 0;
$etapa_anterior = '';
$colors = array('green','blue','chreme');
?>
<div id="timelineLimiterMini" style="padding:3px" class="clickeable <?php echo ($depurado)?'green':'red'?>">
    <div id="timelineScroll">
            <?php
            $j = 0;
            foreach($anios as $anio ):
                if($etapa_anterior != $anio['Etapa']['id']){
                    if(!empty($etapa_anterior)){
                        echo '</ul></div>';
                    }
                    $etapa_anterior = $anio['Etapa']['id'];
                    ?>
                <div class="event">
                <div class="eventHeading <?php echo $colors[$j++%3]?>"><?php echo $anio['Etapa']['name']?></div>
                    <ul class="eventList">
            <?php
                }
            ?>
                        <li><?php echo $anio['anio'];?>�</li>
            <?php
            endforeach;
            ?>
                    </ul>
                </div>
        </div>
</div>
