<div class="related">
	
	<?php 
	if (!empty($anios)):
	?>
	<table>
		<tr>
			<th><?php __('Ciclo'); ?></th>
			<th><?php __('Matr�cula'); ?></th>
			<th><?php __('Duraci�n en Horas'); ?></th>
			<th class="actions"><?php __('');?></th>
		</tr>
	<?
	//reccorro por cada ciclo
		while (list($key,$ciclo) = each($anios)){
		$i = 0;
		
			foreach ($ciclo as $anio):
				$class = null;
				if ($i++ % 2 == 0) {
					$class = ' class="altrow"';
				}
			?>		
		
			<tr id="fila_plan_<?= $anio['ciclo_id'].'_'.$anio['anio']?>" <?php echo $class;?>>
				<th><?php echo $key //muestra el a�o, el ciclo ?></th>
				<td><?php echo $anio['matricula'];?></td>
				<td><?php echo $anio['hs_taller'];?></td>
				<td class="actions">
					<a href="<?= $html->url(array('controller'=> 'anios', 'action'=>'edit/'.$anio['id']))?>" onClick="window.open('<?= $html->url(array('controller'=> 'anios', 'action'=>'edit/'.$anio['id']))?>','_blank' , 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=310,height=500'); return false;">Editar</a>
					<?php echo $html->link(__('Borrar', true), array('controller'=> 'anios', 'action'=>'delete', $anio['id']), null, sprintf(__('Seguro que desea eliminar el a�o # %s? del ciclo # %s', true), $anio['anio'], $anio['ciclo_id'])); ?>
				</td>
			</tr>
			<?php endforeach; //el que recorre los anios del ciclo	?>
		
		<?php }// fin del WHILE...el que recorre los ciclos, los a�os?>
	</table>
<?php endif; ?>
</div>