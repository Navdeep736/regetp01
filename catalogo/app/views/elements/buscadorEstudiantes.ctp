<div>
    <?php
        echo $form->create('Titulo', array(
            'action' => 'titulos',
            'action' => 'guiaDelEstudiante',
            'name'=>'buscadorEstudiantes',
            'id' =>'buscadorEstudiantes',
            )
        );

        echo $form->input(
        'que',
        array(
            'label'=> '�Que?',
            'id' => 'que',
            ));

        echo $form->input(
        'como',
        array(
            'label'=> '�C�mo?',
            'id' => 'como',
            ));

        echo $form->end('Buscar');
    ?>
</div>