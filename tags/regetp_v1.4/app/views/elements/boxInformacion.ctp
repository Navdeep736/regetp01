<?
if ($session->check('Auth.User')){
	if(	$session->read('Auth.User.role') == 'admin' || 
		$session->read('Auth.User.role') == 'desarrollo' ||
		$session->read('Auth.User.role') == 'editor'){
	?>

<div id="boxInformacion">
	<h1>Unidad de Informaci�n</h1>
	<ul>
		<li><? echo $html->link("Nueva Instituci�n","/Instits/add") ?></li>
		<li><? echo $html->link("Descargas","/Queries/descargar_queries") ?></li>
		<li><? echo $html->link("T�tulos","/Titulos") ?></li>
	</ul>
			
</div>


<?	}
} ?>