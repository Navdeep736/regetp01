
<h1><?=$html->image('cambio_cue.gif');echo __('  Buscar Hist�rico de Instituci�n');?></h1>
<p>
Atravez de esta b�squeda se accede a todas las instituciones cuyo CUE es o fue en 
alg�n momento el deseado.  
<br>
Como resultado se l�stan dichas instituciones con informaci�n, si es que corresponde, 
de sus cambios de CUEs y su CUE actual.
<br>

</p>


<h2>Buscar</h2>

	<div>
		<?= $form->create('HistorialCues',array('action' => 'search','name'=>'HistorialCuesSearchForm'));?> 
		<?= $form->input('cue', array('label'=> 'CUE', 'maxlength'=>9 ,'after'=> '<cite>Ej: 600118 o 5000216.</cite>')); ?>
		<?= $form->button('Buscar',array('onclick'=>'enviar()'));?>
	</div>
	<?php echo $form->end(null); ?>
<? 
// con esto agrego la funcionalidad para que al preswionar ENTER me envie el formulario
//echo $javascript->link('form_regetp_ria');?>
<script type="text/javascript">
	function enviar(){
	  	$('HistorialCuesSearchForm').submit();
	}
</script>
