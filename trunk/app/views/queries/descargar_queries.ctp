<h1>Informaci�n</h1>

<script type="text/javascript">
<!--
	Event.observe(window, "keypress", function(e){ 
		var cKeyCode = e.keyCode || e.which; 
		if (cKeyCode == Event.KEY_RETURN){ 
			$('FormCategorias').submit();
		} 
	});
//-->
</script>

<h2>Buscador</h2>
<?php


?>

<?php echo $form->create('Query',array(	'url'=>'/queries/descargar_queries/'.$categoria,
										'id'=>'FormCategorias'));?>
<?php		
		echo $form->input('categoria', array('type'=>'select',
											 'label'=>'Categor�a',
											 'value'=>$categoria,
											 'options'=>$categorias,
											 'onChange'=>'$("FormCategorias").submit();'
											 ));
											 
		echo $form->input('description', array( 'label'=> 'Ingrese criterio de b�squeda',
												'type'=>'text',
										 		'after'=> '<cite>Busca tanto en el nombre del archivo como en la descripci�n.</cite>'));
		echo $form->end('Buscar');										 
?>

<h2>Descargas Excel</h2>
<div>
<br />
<ul>
<?
foreach ($queries as $q):?>
	<li>
		<?= $html->link($q['Query']['name'].'.xls','contruye_excel/'.$q['Query']['id']); ?>
		<?= "(".date("j F, Y, g:i a",strtotime($q['Query']['modified'])).")"; ?>
		<? if($q['Query']['ver_online']) echo $html->link('ver online', '/queries/list_view/'.$q['Query']['id']);?>
		<br /><?=  $q['Query']['description'] ?>
	</li>
	<br />
	<?php 
endforeach;
?>
</ul>
</div>