<?php echo $javascript->link('jsonlib.js'); ?>
<script type="text/javascript">
var etapas = new Array();

function EtapaAdd() {
    var i = etapas.length;
    // guarda la etapa
    //etapas[i] = new Array('etapa_id','edad_teorica','anio','anio_escolaridad');
    etapas[i] = { etapa_id: jQuery("#etapa_id").val(),
                  etapa_nombre: jQuery('#etapa_id :selected').text(),
                  edad_teorica: jQuery("#edad_teorica").val(),
                  anio: jQuery("#anio").val(),
                  anio_escolaridad: jQuery("#anio_escolaridad").val() };

    // agrega al arbol de etapas
    jQuery("#etapas-tree").append("<li>"+etapas[i]['etapa_nombre']+" "+etapas[i]['anio']+"</li>");

    // resetea el form
    jQuery("#edad_teorica").val('');
    jQuery("#anio").val('');
    jQuery("#anio_escolaridad").val('');
}

function EtapaAddObject(etapa) {
    var i = etapas.length;
    // guarda la etapa
    //etapas[i] = new Array('etapa_id','edad_teorica','anio','anio_escolaridad');
    etapas[i] = { etapa_id: etapa.etapa_id,
                  etapa_nombre: unescape(etapa.etapa_nombre),
                  edad_teorica: etapa.edad_teorica,
                  anio: etapa.anio,
                  anio_escolaridad: etapa.anio_escolaridad };

    // agrega al arbol de etapas
    jQuery("#etapas-tree").append("<li>"+etapas[i]['etapa_nombre']+" "+etapas[i]['anio']+"</li>");
}

function EtapasASubmit() {
    // pasa vector etapas para submitear
    jQuery("#etapas").val(array2dToJson(etapas, 'object'));

    return true;
}
</script>
<div class="trayectos form">
<?php echo $form->create('Trayecto', array('onsubmit'=>'return EtapasASubmit();'));?>
	<fieldset>
 		<legend><?php __('Crear Trayecto');?></legend>
	<?php
		echo $form->input('name');
	?>

                <br>
        <b>Agregar etapa</b>
        <br>
        <div id="etapa_1">
        <?php
            echo $form->input('etapa_id', array('id'=>'etapa_id'));
            echo $form->input('edad_teorica', array('id'=>'edad_teorica', 'label'=>'Edad te�rica', 'maxlength'=>2, 'size'=>2, 'style'=>'width: 18px;', 'div' => false));
            echo $form->input('anio', array('id'=>'anio', 'label'=>'A�o', 'maxlength'=>2, 'size'=>2, 'style'=>'width: 18px;', 'div' => false));
            echo $form->input('anio_escolaridad', array('id'=>'anio_escolaridad', 'label'=>'A�o escolaridad', 'maxlength'=>2, 'size'=>2, 'style'=>'width: 18px;', 'div' => false));

            echo $form->button('Agregar etapa', array('id'=>'add', 'onclick'=>'Javascript: EtapaAdd();'));
	?>
        </div>
	</fieldset>
    <ul id="etapas-tree">
    </ul>
<br />
<br />
<?php
echo $form->input('etapas', array('id'=>'etapas', 'type'=>'hidden'));
echo $form->end('Guardar');
?>
</div>
<br />
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Trayectos', true), array('action'=>'index'));?></li>
	</ul>
</div>
<script type="text/javascript">
<?php
if (strlen($this->data['Trayecto']['etapas']) > 3) {
        ?>
            var jsonStr = '<?=$this->data['Trayecto']['etapas']?>';
            var json_data_object = eval("(" + jsonStr + ")");
            for (var i = 0; i < json_data_object.length; i++) {
                EtapaAddObject(json_data_object[i]);
            }
        <?php
}
?>
</script>