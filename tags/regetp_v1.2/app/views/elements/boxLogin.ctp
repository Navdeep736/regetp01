<?
if ($session->check('Auth.User')){
?>
<h1>Mi Cuenta</h1>


<? }else { ?>
<h1>Ingresar</h1>
<?} ?>

<div id="box_loguin">
<? 
	//pr($session->read());
	// If the session info hasn't been set...
	if ($session->check('Auth.User')){		
		echo $html->link('Mis Datos','/users/self_user_edit/'.$session->read('Auth.User.id'));
		echo $html->link('Cambiar Contrase�a','/users/cambiar_password/'.$session->read('Auth.User.id'));
		
		echo $html->link('Salir','/users/logout');
	}else{
		echo $form->create('User', array('action'=>'login','id'=>'menu_logeo'));
		echo $form->input('username',array('label'=>'Usuario'));
		echo $form->input('password', array('type'=>'password','label'=>'Contrase�a'));
		echo $form->end('Entrar');
	} ?>
	
</div>