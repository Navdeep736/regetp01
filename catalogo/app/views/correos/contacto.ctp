<h1>Cont�ctenos</h1>

<p>
    Por favor, complete los campos a continuaci�n:
</p>

<?php

    echo $form->create('Correo', array('action' => 'contacto'));

    echo $form->input('from', array('label'=>'Nombre'));
    echo $form->input('mail', array('label'=>'E-mail'));
    echo $form->input('telefono', array('label'=>'Tel�fono'));

    echo $form->input('descripcion', array('label'=>false, 'rows' => 5, 'cols' => 50));

    echo $form->end('Enviar');

?>