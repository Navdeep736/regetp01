<?
if(isset($script)){
	echo $script;
}
?>
	
<h1 align="center"> <?= "Datos" ?></h1>
<div class="anios form">
<?php echo $form->create('Ticket');?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('user_name', array('readonly'=>true, 'type'=>'text','label'=>'Usuario responsable', 'value'=>$user['nombre']." ".$user['apellido']));
		echo $form->input('modified', array('readonly'=>true, 'type'=>'text','label'=>'�ltima modificaci�n'));				
		echo $form->input('observacion', array('readonly'=>true));
		
		echo $form->input('estado',array('disabled'=>true,'type'=> 'checkbox','checked'=>false,'label'=>'Resuelto.'));
	?>
	</fieldset>
<?php echo $form->end();?>
</div>