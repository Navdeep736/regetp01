
<?
if(isset($script)){
	echo $script;
}
?>
<? $ganchito = $this->data['Anio']['anio'] == 1?'er':'║';?>	
<h1 align="center"> <?= "Editar FP" ?></h1>
<div class="anios form">
<?php echo $form->create('Anio');?>
	<fieldset>	
	<?php
		echo $form->input('id');
		echo $form->input('plan_id',array('type'=>'hidden'));
		
		$anios = array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'99'=>99);
		echo $form->input('anio',array('type'=>'hidden'));
		echo $form->input('etapa_id',array('type'=>'hidden'));
		echo $form->input('ciclo_id');
		
		echo $form->input('matricula',array('label'=>'MatrÝcula'));
		echo $form->input('secciones');
		echo $form->input('hs_taller',array('label'=>'Hs Taller'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
