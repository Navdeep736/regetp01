<?
if ($session->check('Auth.User')){
	if($session->read('Auth.User.role') == 'editor'){
	?>
		<div id="box_admin">
			<h1>Edici�n</h1>
			<ul>
				<li><? echo $html->link("Descargas","/Queries/descargar_queries") ?></li>
				<li><? echo $html->link("Departamentos","/departamentos") ?></li>
				<li><? echo $html->link("Localidades","/localidades") ?></li>
				<b>Depuraci�n</b>
		<li><? echo $html->link("Depto y Loc","/depuradores/deptoyloc") ?></li>
		<li><? echo $html->link("Tipoinstits","/depuradores/tipoinstits") ?></li>				
			</ul>
		</div>

<?	}
} ?>