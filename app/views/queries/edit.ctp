<div class="queries form">
<?php echo $form->create('Query');?>
	<fieldset>
 		<legend><?php __('Edit Query');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('description');
		echo $form->input('query');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Query.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Query.id'))); ?></li>
		<li><?php echo $html->link(__('List Queries', true), array('action'=>'index'));?></li>
	</ul>
</div>
