<?

// por ahora todos lo pueden ver, pero la idea es que solo  los directores vean este box
if ($session->check('Auth.User')){
	if($session->read('Auth.User.role') == 'directivos'){
	
/**
 * 
 * 
 *  Aca iria el DIV que esta abajo
 */
	
	}
} 
?>


<div id="box_fondo">
	<h1>Datos de Fondo</h1>
	<ul>
		<li><? echo $html->link("Jurisdiccional","/Fondos/jurisdiccionales") ?></li>
		<li><? echo $html->link("Informaci�n","/Fondos/informacion") ?></li>
	</ul>
</div>