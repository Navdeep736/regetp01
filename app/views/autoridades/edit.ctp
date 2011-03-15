<?
echo $javascript->link(array(
'jquery.autocomplete','jquery.megaselectlist.js'
));

echo $html->css('jquery.autocomplete.css', false);
?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        /*
         * Bug fix: borro hidden para que permita el funcionamiento de megaselectlist
         */
       jQuery("input:hidden[name='data[Cargo][Cargo]']").remove();

       jQuery("#CargoCargo").megaselectlist({
            classmodifier: "megaselectlist",
            headers: "rel",
            animate: true,
            animateevent: "click",
            multiple: true
        });

        jQuery("#AutoridadJurDepLoc").autocomplete('<?php echo $html->url(array('controller'=>'localidades','action'=>'ajax_search_localidades_y_departamentos'))?>', {
            dataType: "json",
            delay: 200,
            max:30,
            cacheLength:1,
            extraParams: {
                jur: function() { return jQuery('#AutoridadJurisdiccionId').val(); }
            } ,
            parse: function(data) {
                return jQuery.map(data, function(loc_dep) {
                    return {
                        data: loc_dep,
                        value: loc_dep.id,
                        result: formatResult(loc_dep),
                        localidad_id:loc_dep.localidad_id,
                        departamento_id:loc_dep.departamento_id
                    }
                });
            },
            formatItem: function(item) {
                return formatResult(item);
            }
        }).result(function(e, item) {
            jQuery("#hiddenLocId").remove();
            jQuery("#hiddenDepId").remove();
            if(item.type == 'Vacio'){
                jQuery("#AutoridadJurDepLoc").val('');
            }
            else{
                jQuery("#AutoridadEditForm").append("<input id='hiddenLocId' name='data[Autoridad][localidad_id]' type='hidden' value='" + item.localidad_id + "' />");
                jQuery("#AutoridadEditForm").append("<input id='hiddenDepId' name='data[Autoridad][departamento_id]' type='hidden' value='" + item.departamento_id + "' />");
            }
        });

        jQuery("#AutoridadJurDepLoc").attr('autocomplete','off');
    });

    function formatResult(loc_dep) {
        if(loc_dep.type == 'Localidad'){
            return loc_dep.localidad + ', ' + loc_dep.departamento + ' (' + loc_dep.jurisdiccion + ')';
        }
        else if(loc_dep.type == 'Departamento'){
            return loc_dep.departamento + ' (' + loc_dep.jurisdiccion + ')';
        }
        else{
            return loc_dep.localidad;
        }

    }

</script>
<div class="autoridades form">
<?php echo $form->create('Autoridad');?>
	<fieldset>
 		<legend><?php __('Editar Autoridad');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('jurisdiccion_id');
		echo $form->input('nombre');
		echo $form->input('apellido');
		echo $form->input('fecha_asuncion');
		echo $form->input('titulo');
		echo $form->input('telefono_personal');
		echo $form->input('telefono_institucional');
		echo $form->input('email_personal');
		echo $form->input('email_institucional');
		echo $form->input('direccion');
		echo $form->input('jur_dep_loc', array('label'=>'Departamento/Localidad', 'value'=> (isset($locdep['Localidad']['id']))?$locdep['Localidad']['name'] . ', ' . $locdep['Departamento']['name'] . ' (' . $this->data['Jurisdiccion']['name'] . ')' :$locdep['Departamento']['name'] . ' (' . $this->data['Jurisdiccion']['name'] . ')','title'=>'Ingrese al menos 3 letras para que comience la busqueda de Departamentos y Localidades.'));
	?>
                <input id='hiddenLocId' name='data[Autoridad][localidad_id]' type='hidden' value='<?php echo $locdep['Localidad']['id'] ?>' />
                <input id='hiddenLocDepId' name='data[Autoridad][departamento_id]' type='hidden' value='<?php echo $locdep['Departamento']['id'] ?>' />
        <?php
                echo $form->input('Cargo',
                        array(
                            'type' => 'select',
                            'multiple' => true,
                            'options' => array(
                                    'Ministro' => $ministros,
                                    'Referentes' => $referentes
                               )
                            )
                        );
        ?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
