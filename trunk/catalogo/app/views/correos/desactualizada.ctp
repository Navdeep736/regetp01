<h1>Instituci�n desactualizada</h1>

<p>
    No es necesario completar el formulario, pero nos seria de mucha
    ayuda si agrega una descripci�n sobre el problema detectado.
</p>

<?php


echo $form->create('Correo', array('action' => 'desactualizada'));
echo $form->hidden('instit_id');
echo $form->input('descripcion', array('label'=>'Descripci�n', 'type' => 'text', 'rows' => '4'));
echo $form->input('from', array('label'=>'Nombre', 'class'=> ''));
echo $form->input('mail', array('label'=>'E-mail'));
echo $form->input('telefono', array('label'=>'Tel�fono'));
echo $form->end('Enviar');
?>
