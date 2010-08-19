<?echo $javascript->link('jquery.loadmask.min');?>
<script type="text/javascript">
    function toggleTitulos(){
         if (jQuery('#PlanOfertaId').val() != '') {
            jQuery('#divPlanTituloId').show();
        }
        else {
             jQuery('#divPlanTituloId').hide();
        }

        toggleEstructuraPlan();
    }
    
    jQuery(document).ready(function () {
        toggleTitulos();
        toggleEstructuraPlan();

        jQuery(".clickeable").click(function(){
            jQuery(".green").toggleClass("green");
            jQuery(this).toggleClass("green");
            jQuery('#estructura_plan_id').remove();
            if(jQuery(this).hasClass("green")){
                jQuery('#planAdd').append("<input id='estructura_plan_id' name='data[Plan][estructura_plan_id]' type='hidden' value='" + jQuery(this).attr("estructura_plan_id") + "' />");
                jQuery(this).find("#JurisdiccionesEstructuraPlanAsignado").attr("checked", "checked");
            }else{
                jQuery(this).find("#JurisdiccionesEstructuraPlanAsignado").removeAttr("checked");
            }
        });
    });

    function toggleEstructuraPlan() {
        if (jQuery('#PlanOfertaId :selected').val() != 2 && jQuery('#PlanOfertaId :selected').val() != 3) {
            jQuery('#PlanEstructuraPlanId').hide();
        }
        else {
            jQuery('#PlanEstructuraPlanId').show();
        }
    }
</script>

<h1>Nueva Oferta Educativa</h1>

<?
$anexo = ($instit['anexo']<10)?'0'.$instit['anexo']:$instit['anexo'];
$cue_instit = $instit['cue'].$anexo;
?>
<h2><?php echo $cue_instit." - ".$instit['nombre_completo']; ?></h2>

<div class="planes form">
<?php echo $form->create('Plan',array('id'=>'planAdd','action'=>'add/'.$instit['id']));?>
	<fieldset>
	
	<?php
		echo $form->input('instit_id',array('type'=>'hidden','value'=>$instit['id']));
		echo $form->input('oferta_id',array('empty'=>'Seleccione','onchange'=>'toggleTitulos();'));
        ?>
        <div id="PlanEstructuraPlanId" style="display:none">
            <?php if(sizeof($estructuraPlanes)  > 0){ ?>
            <label>Elija una de las estructuras:</label>
            <?
                    foreach($estructuraPlanes as $estructura){
            ?>

            <!--<?php echo $estructura['EstructuraPlan']['name'];?>-->

            <div id="timelineLimiterMini" estructura_plan_id="<?php echo $estructura['EstructuraPlan']['id']?>" class="clickeable">
                <i><?php echo $estructura['EstructuraPlan']['name'];?></i>
                <div id="timelineScroll" style="margin-left: 0px;">
                    <div>
                        <div class="event">
                            <div class="eventHeading blue"><?php echo $estructura['EstructuraPlan']['Etapa']['name']?></div>
                                <ul class="eventList">
                        <?php
                        $j = 0;
                        foreach($estructura['EstructuraPlan']['EstructuraPlanesAnio'] as $anio ):
                        ?>
                            <li><?php echo $anio['nro_anio'];?>�</li>
                        <?php
                        endforeach;
                        ?>
                                </ul>
                        </div>
                        <!--<div class="instit_link_list" style="clear:none">
                            <?php
                            echo $form->checkbox('asignado',array('name'=>'data[JurisdiccionesEstructuraPlan]['. $i . '][asignado]'));
                            ?>
                        </div>-->
                    </div>
                </div>
            </div>
        <?php
                }
            }
            else{
        ?>
            <div class="message">No existen estructuras asignadas a la jurisdicci�n</div>
        <?php }?>
        </div>
        <?php
                //echo $form->input('estructura_plan_id',array('id'=>'PlanEstructuraPlanId', 'empty'=>'Seleccione'));

                $meter = '<span class="ajax_update" id="ajax_indicator" style="display:none;">'.$html->image('ajax-loader.gif').'</span>';
                echo $form->input(
                'titulo_id',
                array(
                    'empty'=>'Seleccione',
                    'label'=> 'T�tulo de Referencia',
                    'after'=> $meter.'<br /><cite>Seleccione primero una oferta.</cite>',
                    'div'=>array('id'=>'divPlanTituloId')));
                echo $ajax->observeField(
                'PlanOfertaId',
                array(
                    'update'=> 'PlanTituloId',
                    'url'=>'/titulos/list_por_oferta_id',
                    'loading'=>'jQuery("#ajax_indicator").show();jQuery("#PlanTituloId").attr("disabled","disabled")',
                    'complete'=>'jQuery("#ajax_indicator").hide();jQuery("#PlanTituloId").removeAttr("disabled")',
                    'onChange'=>true)
                     );
        
		echo $form->input('norma',array('label'=>'Normativa'));
		
                echo $form->input('nombre');
		echo $form->input('perfil');
		
		
		$meter = '<span class="ajax_update" id="ajax_indicator2" style="display:none;">'.$html->image('ajax-loader.gif').'</span>';
		echo $form->input('sector_id',array('type'=>'select','empty'=>'Seleccione','options'=>$sectores,'label'=>'Sector','id'=>'sector_id','after'=>$meter));

		echo $form->input('subsector_id', array('empty' => 'Seleccione','type'=>'select','label'=>'Subsector','after'=> $meter.'<br /><cite>Seleccione primero un sector.</cite>'));
		echo $ajax->observeField('sector_id',
                                   array(  	'url' => '/subsectores/ajax_select_subsector_form_por_sector',
		                                   	'update'=>'PlanSubsectorId',
		                                   	'loading'=>'jQuery("#ajax_indicator2").show();jQuery("#PlanSubsectorId").attr("disabled","disabled")',
		                                   	'complete'=>'jQuery("#ajax_indicator2").hide();jQuery("#PlanSubsectorId").removeAttr("disabled")',
		                                   	'onChange'=>true
                                   ));
                                   
		echo "<br>Duraci�n:";
		echo $form->input('duracion_hs',array('label'=>'- Horas','maxlength'=>9));
		//echo $form->input('duracion_semanas',array('label'=>'- Semanas','maxlength'=>9));
		echo $form->input('duracion_anios',array('label'=>'- A�os','maxlength'=>9));

		
		echo "<br>";
		/**
		 *    OBSERVACION
		 */	
		echo $form->input('observacion');
		
		
		/**
		 *    CICLOS ALTA Y MODIFICACION
		 */	
		echo $form->input('ciclo_alta', array(
                          "type" => "select",
                          "options" => $ciclos,
                          'label'=>'Alta',
                          "selected" => date('Y')
		));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
	
