<?
if ($session->check('Auth.User')){
	if($session->read('Auth.User.role') == 'admin'){
	?>
		<div id="divAdmin">
			<h1>Administraci�n</h1>
			<ul>
				<li><? echo $html->link("Agregar Usuario","/Users/add") ?></li>
			</ul>
		</div>

<?	}
} ?>