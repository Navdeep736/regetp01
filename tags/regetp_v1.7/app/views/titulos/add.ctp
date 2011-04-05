<?php
echo $javascript->link(array(
        'jquery.loadmask.min',
        'views/titulos/addedit',
        'activespell/cpaint/cpaint2.inc.compressed.js',
        'activespell/js/spell_checker'
    ));
echo $html->css(array('jquery.loadmask', 'spell_checker.css'));
?>
<script type="text/javascript">
    
</script>
<div class="titulos form">
<h2><?php __('Nuevo T�tulo de Referencia');?></h2>
<?php echo $form->create('Titulo', array('onsubmit'=>'return Validate()'));?>
	<fieldset>
                <h2>Datos</h2>
	<?php
                echo $form->input('oferta_id');
		echo $form->input('name', array(
                    'label'=>'Nombre del T�tulo',
                    'title' => 'spellcheck_icons',
                    'style' => 'width: 85%; clear: none;',
                    ((Configure::read('modo_linux'))? 'accesskey': '') => $html->url('/js/activespell/').'spell_checker.php',
                    'div'=>'divTituloName'));
        ?>
                <div id="similars" class="attention"></div>
        <?php
		echo $form->input('marco_ref', array(
                                                    'legend'=>'Marco de Referencia',
                                                    'type'=>'radio',
                                                    'checked' => 1,
                                                    'options'=>array(1=>'Con Marco de Referencia', 0=>'Sin marco de Referencia'))
		);
	?>
        <h2>Sectores/Subsectores</h2>
        <cite>Agregue los Sectores/Subsectores correspondientes y seleccione el prioritario</cite>
        <div id="sectores">
            <div class="js-sector">
                <span>
                    <select class="js-sector-id" name="data[Titulo][SectoresTitulos][sector_id][]">
                        <?php foreach($sectores as $key=>$sector){?>
                            <option value="<?php echo $key?>"><?php echo $sector?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select class="js-subsector-id" name="data[Titulo][SectoresTitulos][subsector_id][]">
                        <option value="0">Ninguno</option>
                    </select>
                    <span class="spinner">
                    <?php
                    echo $html->image('loadercircle16x16.gif')
                    ?>
                    </span>
                    <span>
                        <input class="js-prioridad" type="radio" name="prioridades"/>
                        <input class="js-prioridad-hd" type="hidden" name="data[Titulo][SectoresTitulos][prioridad][]" value="0"/>
                    </span>
                </span>
                <span>
                    <?php echo $html->image('close.png',array('onclick'=>"if(jQuery('.js-sector').size() > 1)jQuery(this).closest('.js-sector').remove()")) ?>
                </span>
            </div>
        </div>
        <a style="cursor:pointer" onclick="jQuery('#sectores').append(jQuery('#sectores .js-sector').first().outer())">Agregar</a>
	</fieldset>
    <br />
<?php echo $form->end('Guardar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Listar T�tulos', true), array('action'=>'index'));?></li>
	</ul>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.js-sector-id').live('change', function() {
            spinner = jQuery(this).parent().find('.spinner');
            PopularCombo(jQuery(this).parent().find('.js-subsector-id'),"<?= $html->url(array('controller'=> 'subsectores', 'action'=>'getSubSectoresBySector'))?>",{'sector' : jQuery(this).val()},true, spinner);
        });
        jQuery('.js-prioridad').live('change', function() {
            jQuery('#sectores input:checkbox').not(this).attr('checked', false);
            jQuery('#sectores input:hidden').val("0");
            jQuery(this).parent().find('.js-prioridad-hd').val("1");
        });

        
        jQuery('#sectores .js-prioridad').first().attr("value","1");

        jQuery('.js-sector-id').change();

        jQuery("#TituloName").live('blur', function() {
            SearchSimilars('<?php echo $html->url('/titulos/ajax_similars/');?>', jQuery("#TituloName").val());
        });
    });
</script>