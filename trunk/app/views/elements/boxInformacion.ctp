<?
if ($session->check('Auth.User')){
	if($session->read('Auth.User.role') == 'admin'){
	?>

<div id="boxInformacion">
	<h1>Unidad de Informaci�n</h1>
	<ul>
		<li><? echo $html->link("Descargas","/Queries/descargar_queries") ?></li>
		<b>Depuraci�n</b>
		<li><? echo $html->link("Depto y Loc","/depuradores/deptoyloc") ?></li>
		<li><? echo $html->link("Tipoinstits","/depuradores/tipoinstits") ?></li>
	</ul>
</div>


<?	}
} ?>