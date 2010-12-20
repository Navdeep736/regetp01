<?php
echo $javascript->link(array(
            'jquery.autocomplete',
            'jquery.blockUI'
        ));

echo $html->css(array('jquery.autocomplete'));
?>
<script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery.each(jQuery('#formPlanes input:checkbox'), function(key, value) {
                jQuery(value).attr("checked", false);
            });

            jQuery('#formPlanes').change(function() {
                jQuery.each(jQuery('#formPlanes'), function(key, value) {
                    if (jQuery(value).is(':checked')) {
                        jQuery('#plan-linea-'+jQuery(value).attr('numero')).attr('style', 'background:#EFFBEF');
                    }
                    else {
                        jQuery('#plan-linea-'+jQuery(value).attr('numero')).attr('style', 'background:white');
                    }
                });
            });


             jQuery('#FPlanConTitulo').change(function() {
                 if (jQuery('#FPlanConTitulo').val() != 'sin') {
                     jQuery('#FPlanSectorId').removeAttr('disabled');
                     jQuery('#FPlanSubsectorId').removeAttr('disabled');
                     jQuery('#DivFPlanSectorId').show();
                     jQuery('#DivFPlanSubsectorId').show();

                 }
                 else {
                     jQuery('#FPlanSectorId').attr('disabled', 'true');
                     jQuery('#FPlanSubsectorId').attr('disabled', 'true');
                     jQuery('#DivFPlanSectorId').hide();
                     jQuery('#DivFPlanSubsectorId').hide();
                 }
             });

            //jQuery('#titulo_id').change(seleccionarTitulosEnMasa);
            //actualizarSelects();


            /*******/
            

            jQuery("#TituloName").autocomplete("<?echo $html->url(array('controller'=>'titulos','action'=>'ajax_search'));?>", {
                dataType: "json",
                delay: 200,
                max:30,
                cacheLength:0,
                extraParams: {
                    oferta_id: function() { return jQuery('#FPlanOfertaId').val(); },
                    sector_id: function() { return jQuery('#FPlanSectorId').val(); },
                    subsector_id: function() { return jQuery('#FPlanSubsectorId').val(); }
                } ,
                parse: function(data) {
                    return jQuery.map(data, function(titulo) {
                        return {
                            data: titulo,
                            value: titulo.id,
                            result: formatResult(titulo)
                        }
                    });
                },
                formatItem: function(item) {
                    return formatResult(item);
                }
            }).result(function(e, item) {
                if(item.type == 'Vacio'){
                    jQuery("#TituloName").val('');
                    jQuery("#titulo_id").val('');
                }
                else{
                    jQuery("#titulo_id").val(item.id);
                }
            });

            jQuery("#TituloName").attr('autocomplete','off');

            jQuery("#FPlanTituloName").autocomplete("<?echo $html->url(array('controller'=>'titulos','action'=>'ajax_search'));?>", {
                dataType: "json",
                delay: 200,
                max:30,
                cacheLength:0,
                extraParams: {
                    oferta_id: function() { return jQuery('#FPlanOfertaId').val(); },
                    sector_id: function() { return jQuery('#FPlanSectorId').val(); },
                    subsector_id: function() { return jQuery('#FPlanSubsectorId').val(); }
                } ,
                parse: function(data) {
                    return jQuery.map(data, function(titulo) {
                        return {
                            data: titulo,
                            value: titulo.id,
                            result: formatResult(titulo)
                        }
                    });
                },
                formatItem: function(item) {
                    return formatResult(item);
                }
            }).result(function(e, item) {
                if(item.type == 'Vacio'){
                    jQuery("#FPlanTituloName").val('');
                    jQuery("#fp_titulo_id").val('');
                }
                else{
                    jQuery("#fp_titulo_id").val(item.id);
                }
            });

            jQuery("#FPlanTituloName").attr('autocomplete','off');
        });


        function formatResult(titulo) {
            return titulo.name;
        }


	function checkAll(){
            jQuery.each(jQuery('#formPlanes input:checkbox'), function(key, value) {
                jQuery(value).attr("checked", true);
                jQuery('#plan-linea-'+jQuery(value).attr('numero')).attr('style', 'background:#EFFBEF');
            });
	}


	function unCheckAll(){
            jQuery.each(jQuery('#formPlanes input:checkbox'), function(key, value) {
                jQuery(value).attr("checked", false);
                jQuery('#plan-linea-'+jQuery(value).attr('numero')).attr('style', 'background:white');
            });
	}


	function cambiarTitulos(element){
            jQuery(element).select(jQuery('#titulo_id').val());
	}


        function seleccionarTitulosEnMasa() {
            jQuery.each(jQuery('.titulo'), function(key, value) {
                jQuery(value).val(jQuery('#titulo_id').val());
            });
        }


        function actualizarSelects() {
            var selectedText = jQuery('#titulo_id option:selected').text();

            jQuery.each(jQuery('.titulo'), function(key, value) {
                jQuery(value).val(jQuery('#titulo_id').val());
                jQuery(value).append(jQuery("<option></option>").attr("value",jQuery('#titulo_id').val()).text(selectedText));
            });
        }
</script>
<h1>Corrector de T�tulos de Planes</h1>

<?
$paginator->options(array('url' => $url_conditions));
?>

<!-- 	BUSQUEDA POR SU OFERTA  	-->

<div id="search-planes" style="font-size:9pt;">
    <?php echo $form->create('Form',array('url'=>'/titulos/corrector_de_planes','id'=>'Form'));?>
    <?
    echo $form->input('FPlan.oferta_id',array(
                        'options'=>$ofertas,
                        'empty'=>'Todas',
                        'label'=>'Oferta'));

    echo $form->input('FPlan.con_titulo',array(
                        'options'=> array('con' => 'Con T�tulo de Referencia', 'sin' => 'Sin T�tulo de Referencia'),
                        'empty'=>'Todos',
                        'label'=>'Planes'));

    $meter = '<span class="ajax_update" id="ajax_indicator" style="display:none;">'.$html->image('ajax-loader.gif').'</span>';
    echo $form->input('FPlan.jurisdiccion_id', array(
                        'empty' => array('0'=>'Todas'),
                        'id'=>'jurisdiccion_id',
                        'label'=>'Jurisdicci�n',
                        'after'=>$meter,
                        'options'=>$jurisdicciones,

    ));
    ?>
    <?php
    echo $form->input('FPlan.sector_id',array(
                        'label'=>'Sector',
                        'options'=>$sectores,
                        'empty'=>'Todos',
                        'div' => array('id' => 'DivFPlanSectorId')
    ));

    echo $form->input('FPlan.subsector_id', array(
                        'label'=>'Subsector',
                        'empty'=>'Todos',
                        'div' => array('id' => 'DivFPlanSubsectorId')
            ));
    ?>
    <?php
    echo $form->input('FPlan.limit',array(
            'label'=>'Cantidad de planes por p�gina',
            'options'=>array('10'=>10,'20'=>20,'40'=>40,'60'=>60)
         ));

    echo $form->input('FPlan.plan_nombre', array('label'=>'Nombre del Plan', 'after'=> '<cite>Realiza una b�squeda por parte del nombre del plan.<br>Ej: Soldadura</cite>'));

    echo $form->input('FPlan.TituloName', array('label'=>'Nombre del Titulo', 'after'=> '<cite>Realiza una b�squeda por parte del nombre del t�tulo.<br>Ej: T�cnico</cite>'));

    echo $form->input('FPlan.titulo_id', array(
        'type'=>'hidden',
        'id'=>'fp_titulo_id'
    ));

    echo $ajax->observeField(
            'FPlanSectorId', array(
                'url' => '/subsectores/ajax_select_subsector_form_por_sector',
                'update'=>'FPlanSubsectorId',
                'loading'=>'jQuery("#FPlanSubsectorId").attr("disabled", true);',
                'complete'=>'jQuery("#FPlanSubsectorId").attr("disabled", false);',
                'onChange'=>true
    ));

   
   echo $form->end('Buscar', array(
                    'style'=>'  display: block;
                                width: 100px;
                                vertical-align: bottom;
                                margin-top: 7px;
                                margin-left: 4px;
                                border-color: #CEE3F6;
                                background-color: #DBEBF6;
                                color: #045FB4;
                                font-weight: bold;'
       ));
?>

 </div>



<hr>

<h1><?php echo $paginator->counter(array(
			'format' => '%count%'));?> planes encontrados</h1>

<?php
if (!empty($planes))
{
    echo $form->create('Plan', array(
                            'url'=>'/titulos/corrector_de_planes',
                            //'onsubmit'=>'activarCambios(); return false;',
                            'id'=>'formPlanes'
    ));


    echo $form->button('Seleccionar Todos', array('onclick'=>'checkAll()', 'style'=>'clear:none;float:left;width:144px;'));
    echo $form->button('Deseleccionar Todos', array('onclick'=>'unCheckAll()', 'style'=>'clear:none;float:left;width:144px;'));

    $i = 0;
    foreach ($planes as $p) {

            $div_id = "plan-id-".$p['Plan']['id'];
            ?>


            <div style="font-size: 9pt;" id="plan-linea-<?= $i?>">
                    <?php echo $form->input("Plan.$i.id",array('value' =>$p['Plan']['id']));?>

                    <?php echo $form->checkbox("Plan.$i.selected", array(
                                'id'=>"checkbox-$i",
                                'numero'=>$i,
                        ));
                    ?>
                <a style="font-size: 10px;" href="javascript:" onclick="jQuery('#<? echo $div_id?>').toggle(); return false;"><?= $p['Plan']['nombre']?></a> <i><?=($p['Plan']['titulo_id'] > 0 ? '(' . $p['Titulo']['name'] . ')':'(No tiene T�tulo)')?></i>
            </div>
            <div style="display: none; background-color: beige; font-size: 9pt;" id="<? echo $div_id?>">

                    <?php echo $html->link('ir al plan', '/Planes/view/'.$p['Plan']['id'], array('style'=> 'float: right;', 'target'=>'_blank'))?>
                    <dl>
                            <?php $nombre = (empty($p['Instit']['nombre']))? 'SIN NOMBRE':$p['Instit']['nombre'];?>
                            <dt>Instituci�n:</dt>			<dd><?php echo $html->link($nombre,'/instits/view/'.$p['Instit']['id'], array('target'=>'_blank'));?>&nbsp;</dd>
                            <dt>Oferta:</dt>				<dd><?php echo $p['Oferta']['name']?>&nbsp;</dd>
                            <dt>T�tulo:</dt>				<dd><b><?php echo @$p['Titulo']['name']?></b>&nbsp;</dd>
                            <?php
                                $sectores = $subsectores = array();
                                foreach ($p['Titulo']['SectoresTitulo'] as $sector) {
                                    if (!empty($sector['Sector']['name']))
                                        $sectores[] = $sector['Sector']['name'];
                                    
                                    if (!empty($sector['Subsector']['name']))
                                        $subsectores[] = $sector['Subsector']['name'];
                                }
                            ?>
                            <dt>Sectores:</dt>				<dd><?php echo implode(', ', $sectores); ?>&nbsp;</dd>
                            <dt>Subsectores:</dt>				<dd><?php echo implode(', ', $subsectores); ?>&nbsp;</dd>
                            <dt>Duracion:</dt>				<dd><?php echo " - ";?>&nbsp;</dd>
                            <dt>&nbsp;&nbsp;-- Horas:</dt>	<dd><?php echo $p['Plan']['duracion_hs'];?>&nbsp;</dd>
                            <dt>&nbsp;&nbsp;-- Semanas:</dt><dd><?php echo $p['Plan']['duracion_semanas'];?>&nbsp;</dd>
                            <dt>&nbsp;&nbsp;-- A�os:</dt>	<dd><?php echo $p['Plan']['duracion_anios'];?>&nbsp;</dd>
                            <dt>Matricula:</dt>				<dd><?php echo $p['Plan']['matricula']?>&nbsp;</dd>
                            <dt>Observaci�n:</dt>			<dd><?php echo $p['Plan']['observacion']?>&nbsp;</dd>
                            <dt>Alta:</dt>					<dd><?php echo date('d/m/Y',strtotime($p['Plan']['created']))?>&nbsp;</dd>
                            <dt>Modificaci�n:</dt>			<dd><?php echo date('d/m/Y',strtotime($p['Plan']['modified']))?>&nbsp;</dd>

                            <?php
                                $ciclos = array();
                                foreach ($p['Anio'] as $anio) {
                                    if (!empty($anio['ciclo_id']))
                                        $ciclos[] = $anio['ciclo_id'];
                                }
                            ?>
                            <dt>Ciclos con informaci�n</dt><dd><?php echo implode(' - ', $ciclos); ?>&nbsp;</dd>

                    </dl>
            </div>

    <?php
            $i++;
    }

    echo $form->input(
    'tituloName',
    array(
        'label'=> 'Asignar T�tulo',
        'id' => 'TituloName',
        'after'=> '<span class="ajax_update" id="ajax_indicator" style="display:none;">'.$html->image('ajax-loader.gif').'</span>',
        'style'=>'max-width: 550px;',
        'div'=>array('id'=>'divTituloName')));
     echo $form->input('titulo_id', array(
        'type'=>'hidden',
        'id'=>'titulo_id',
        'value'=>$titulo_id
        ));



    //echo $form->button('Seleccionar Todos', array('onclick'=>'checkAll()', 'style'=>'clear:none;float:left;width:144px;'));
    //echo $form->button('Deseleccionar Todos', array('onclick'=>'unCheckAll()', 'style'=>'clear:none;float:left;width:144px;'));

    ?>

    <div>
    <?php
    echo $paginator->prev('<< '.__('Anterior', true), array(), null, array('class'=>'disabled'));
    echo ' '.$paginator->numbers(array('modulus'=>13));
    echo $paginator->next(__('Siguiente', true).' >>', array('style'=>'float:right;'), null, array('class'=>'disabled'));
    ?>
    </div>


    <?php

    echo $form->button('Seleccionar Todos', array('onclick'=>'checkAll()', 'style'=>'clear:none;float:left;width:144px;'));
    echo $form->button('Deseleccionar Todos', array('onclick'=>'unCheckAll()', 'style'=>'clear:none;float:left;width:144px;'));



    echo $form->hidden('FPlan.limit');
    echo $form->hidden('FPlan.oferta_id');
    echo $form->hidden('FPlan.sector_id');
    echo $form->hidden('FPlan.subsector_id');
    echo $form->hidden('FPlan.jurisdiccion_id');
    echo $form->hidden('FPlan.plan_nombre');

    if (strlen($paginator->counter(array('format' => '%page%'))))
        echo $form->hidden('FPlan.last_page', array('value' => $paginator->counter(array('format' => '%page%'))));

    echo $form->end('Guardar Cambios');

}
?>

<br />
<?php echo  $html->link('Agregar Nuevo T�tulo de Referencia', array('controller'=>'titulos','action'=>'add'), array('target'=>'_blank')); ?>
<br />