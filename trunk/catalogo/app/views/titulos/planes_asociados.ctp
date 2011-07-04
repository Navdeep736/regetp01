<?php
echo $html->css('catalogo.instits', false);
echo $html->css('catalogo.advanced_search', false);

$paginator->options(array(
'url'     => $this->passedArgs,
'update'  => 'tituloPlanes',
'indicator' => 'spinner',
));
?>
<div class="boxblanca" id="search_results">
    <div style="float:right">
        <?php
        echo $form->create('Titulo', array(
            'action' => 'view/' . $id,
            'name'=>'InstitsForm',
            'id' =>'InstitsForm',
            )
            );
        echo $form->input('Instit.jurisdiccion_id', array('label'=>'Jurisdicci�n',
                                                                      'div' => false,
                                                                      'class' => 'autosubmit ',
                                                                      'value' => $jurisdiccion_id,
                                                                      'empty' => array('vacio'=>'Todas'),
                                                                      'id'=>'jurisdiccion_id'));
        echo $form->end();
        ?>
    </div>
    <? if (sizeof($criterios)>0): ?>
	Criterios de b�squeda seleccionados:
	<dl class="criterios_busq">
	<?

	 foreach($criterios as $key => $value){
		?><dt><?
			echo '- '.$key.': ';
		?></dt><?
		?><dd><?
			echo $value."&nbsp";
		?></dd><?
	}

	?>
	</dl>
    <? endif; ?>
    <div class="list-header">
        <div class="sorter">
            <?php
            $sort = 'cue';
            if(isset($this->passedArgs['sort'])){
            $sort = $this->passedArgs['sort'];
            }
            ?>
            Ordenar por:
            <? $class = ($sort == 'Instit.cue')?'marcada':'';?>
            <span class="<?= $class?>"><?php echo $paginator->sort('CUE','Instit.cue');?></span>,

            <? $class = ($sort == 'Localidad.name')?'marcada':'';?>
            <span class="<?= $class?>"><?php echo $paginator->sort('Localidad','Localidad.name');?></span>,

            <? $class = ($sort == 'Departamento.name')?'marcada':'';?>
            <span class="<?= $class?>"><?php echo $paginator->sort('Departamento','Departamento.name');?></span>,

            <? $class = ($sort == 'Jurisdiccion.name')?'marcada':'';?>
            <span class="<?= $class?>"><?php echo $paginator->sort('Jurisdiccion','Jurisdiccion.name');?></span>

        </div>
        <div class="paging">
            <?php echo $paginator->counter(array(
            'format' => __('Instituciones %start%-%end% de <strong>%count%</strong>', true))); ?>
        </div>
        <div class="clear"></div>
    </div>
    <? if (!empty($planes) > 0) { ?>
    <ol id="items">
        <?php foreach($planes as $plan) : ?>
        <?  $a�o_actual = date("Y");
        $fecha_hasta = "$a�o_actual-07-21"; //hasta julio
        $fecha_desde = "$a�o_actual-01-01"; //desde enero
        $clase = '';
        if($plan['Instit']['activo']) {
        $clase .= ' escuela_activa';
        }else {
        $clase .= ' escuela_inactiva';
        }
        ?>
        <li>
            <a href="<?php echo $html->url(array(
                                    'controller' => 'instits',
                                    'action' => 'view',
                                    'id' => $plan['Instit']['id'],
                                    'slug' => slug($plan['Instit']['nombre_completo'])))
                    ?>" style="display:block; cursor:pointer;">
            <div class="items-nombre">
                <?= "".($plan['Instit']['cue']*100)+$plan['Instit']['anexo']." - ". $plan['Instit']['nombre_completo']; ?>
            </div>
            <div class="clear"></div>
            <div class="items-domicilio">
                Domicilio:
                    <?php
                    echo joinNotNull(", ", array($plan['Instit']['direccion'],$plan['Instit']['lugar'],
                    $plan['Instit']['Localidad']['name'],
                    $plan['Instit']['Departamento']['name'] == $plan['Instit']['Localidad']['name']?null:$plan['Instit']['Departamento']['name'],
                    $plan['Instit']['Jurisdiccion']['name']));
                    ?>
            </div>
            <div class="items-gestion"><?= $plan['Instit']['Gestion']['name'] ?></div>
            <div class="items-actions">
                <span class="mas_info_azul_small"></span>
            </div>
            <div class="clear"></div>
            </a>
        </li>

        <? endforeach?>
    </ol>
    <?php
    }
    else {
        ?>
    <div id="no_results">No hay resultados</div>
    <?php
    }
    
    if ($paginator->numbers()) {
    ?>
    <div style="text-align:center; display:block;margin-bottom: 10px">
        <?php
        echo $paginator->prev('� Anterior ',null, null, array('class' => 'disabled', 'tag' => 'span'));
        echo " | ".$paginator->numbers(array('modulus'=>'9'))." | ";
        echo $paginator->next(' Siguiente �', null, null, array('class' => 'disabled'));
        ?>
        <span class="ajax_update" id="ajax_paginator_indicator" style="display:none; padding-left:10px;"><?php echo $html->image('ajax-loader.gif')?></span>
    </div>
    <?php  } ?>
</div>
<script type="text/javascript">
    $(".autosubmit").change(function() {
        $('#InstitsForm').submit();
    });
</script>