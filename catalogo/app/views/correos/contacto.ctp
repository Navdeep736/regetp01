<h1>Instituci�n desactualizada</h1>

<p>
    No es necesario completar el formulario, pero agrademos si puede enviarnos mayor informaci�n
</p>

<?php

$form->create('Correo', array('action' => 'contacto'));
$form->input('descripcion', array('label'=>'Descripci�n'));
$form->input('from', array('label'=>'Ingrese su Nombre'));
$form->input('mail', array('label'=>'Ingrese su e-mail'));
$form->input('telefono', array('label'=>'Ingrese su tel�fono'));
$form->end('Enviar');