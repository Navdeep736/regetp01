<h1>Cont�ctenos</h1>


<div class="grid_4 alpha" style="margin-top: -12px; ">
     <?php echo $html->image('contact_icon.png'); ?>
</div>

<div class="omega boxblanca formu_4">
    <br />
    <?php

    echo $form->create('Correo', array('action' => 'contacto'));

    echo $form->input('from', array('label'=>'Nombre'));
    echo $form->input('mail', array('label'=>'E-mail'));
    echo $form->input('telefono', array('label'=>'Tel�fono'));

    echo $form->input('descripcion', array('label'=>false, 'rows' => 5, 'cols' => 50));

    echo $form->end('Enviar');

    ?>
</div>

<div class="grid_4 boxgris">
     
    <h2 style="margin: 10px 20px;">Unidad de Informaci�n</h2>
    <p style="margin: 10px 20px;">       
        Este formulario lo comunica con la Unidad de Informaci�n del INET oficina 311.
        Puede enviarnos un mensaje desde aqu�, o desde nuestro correo electr�nico: ui@inet.edu.ar.
        <br /><br /> 
        Si lo desea pude llamarnos por tel�fono de 10 a 18 hs al (011) 4129-2000 Interno 4032/4033.
    </p>
</div>

