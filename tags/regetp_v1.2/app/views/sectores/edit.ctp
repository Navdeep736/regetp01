<div class="sectores form">
<?php echo $form->create('Sector');?>
	<fieldset>
 		<legend><?php __('Edit Sector');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Sector.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Sector.id'))); ?></li>
		<li><?php echo $html->link(__('List Sectores', true), array('action'=>'index'));?></li>
	</ul>
</div>
