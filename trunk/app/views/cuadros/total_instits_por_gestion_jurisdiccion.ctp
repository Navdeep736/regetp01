<h2>Total de Instituciones de Educaci�n T�cnica Profesional ingresadas a la Base de Datos del Registro Federal de Instituciones de Educaci�n T�cnica Profesional (RFIETP) por �mbito de gesti�n seg�n divisi�n pol�tico-territorial.</h2>
<div align="center">
<br>

<table width="80" cellpadding = "0" cellspacing = "0" summary="" style="border-style: solid; border-width: 1px; border-color: gray; ">
<tr class="altrow2">
	<?php foreach ($precols as $key=>$precol): 
		$colspan = ($key==1)? "colspan=2":"";	
		?>		
		<th <?php echo $colspan;?>><?php echo $precol;?></th>
	<?php endforeach; ?>
</tr>
<tr class="altrow2">
	<?php foreach ($cols as $col): ?>
	<th><?php echo $col;?></th>
	<?php endforeach; ?>
</tr>
<?php
$i = 0;
foreach ($queries as $query):
	$class = '';
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<?php 
	$style = ($query[0]['Divisi�n pol�tico-territorial']== 'Total')?' style="background-color: #fff; color: #233e87; font-weight: bolder; border-top: 1px solid silver;':'style="';
	?>
	<tr<?php echo $class;?>>
	   <?php foreach($query[0] as $head=>$line): 
	   	if($head == 'Divisi�n pol�tico-territorial') {
	   		$style1 = $style.'text-align:left;"';
	   	}
	   	else {
	   		$style1 = $style.'text-align:right;"';
	   	}
	   ?>
		<td <?php echo $style1?>>
			<?php echo $line; ?>
		</td>
		<?php endforeach; ?>
	</tr>
<?php endforeach; ?>
</table>
</div>

<br>
<cite style="font-size: 10px;"><u>Fuente</u>: INET-Ministerio de Educaci�n. Unidad de informaci�n - �rea Registro Federal de Instituciones de Educaci�n Profecional. informaci�n al <?php echo date("d-m-Y");?></cite>
<br><br>
<cite style="font-size: 10px;"><u>Nota</u>: Desde Diciembre de 2007 se adopt� un nuevo criterio de clasificaci�n de las instituciones de ETP ingresadas al Registro Federal de Instituciones de ETP. En los casos que la instituci�n oferta m�s de un nivel de ense�anza se la categoriz� de acuerdo al mayor nivel que brinda, de forma de evitar contabilizar un mismo establecimiento m�s de una vez. De ah� las diferencias que pueden observarse con los informes trimestrales previamente presentados.<br>Se incluyeron por otra parte de forma diferenciada a las instituciones de ETP dependientes de Universidad Nacionales.</cite>
