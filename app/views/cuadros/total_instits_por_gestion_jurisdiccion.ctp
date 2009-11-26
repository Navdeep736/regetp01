<h1>Total de Instituciones de Educaci�n T�cnica Profesional ingresada a la Base de Datos del Registro Federal de Instituciones de Educaci�n T�cnica Profesional (RFIETP) por �mbito de gesti�n seg�n divisi�n pol�tico-territorial.</h1>
<div align="center">
<br>
<p style="text-align: center;">
<?php
if (isset($paginator)){
echo $paginator->counter(array(
	'format' => __('P�gina %page% de %pages% Mostrando %current% registros de %count% encontrados', true)
));
}
?>
</p>

<table width="80" cellpadding = "0" cellspacing = "0" summary="">
<tr class="altrow2">
	<?php foreach ($cols as $col): ?>
	<th><?php echo $col;?></th>
	<?php endforeach; ?>
</tr>
<?php
$i = 0;
foreach ($queries as $query):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
	   <?php foreach($query[0] as $line):?>	
		<td>
			<?php echo $line; ?>
		</td>
		<?php endforeach; ?>
	</tr>
<?php endforeach; ?>
</table>
</div>
<cite><u>Nota</u>: Desde Diciembre de 2007 se adopt� un nuevo criterio de clasificaci�n de las instituciones de ETP ingresadas al Registro Federal de Instituciones de ETP. En los casos que la instituci�n oferta m�s de un nivel de ense�anza se la categoriz� de acuerdo al mayor nivel que brinda, de forma de evitar contabilizar un mismo establecimiento m�s de una vez. De ah� las diferencias que pueden observarse con los informes trimestrales previamente presentados.<br>Se incluyeron por otra parte de forma diferenciada a las instituciones de ETP dependientes de Universidad Nacionales.</cite>
<div class="paging" align="center">
	<?php 
	if (isset($paginator)){
		echo $paginator->prev('<< '.__('Anterior', true), array(), null, array('class'=>'disabled'));
		echo "&nbsp;";
		echo $paginator->numbers();
		echo "&nbsp;";
		echo $paginator->next(__('Siguiente', true).' >>', array(), null, array('class'=>'disabled'));
	}		
	?>
</div>