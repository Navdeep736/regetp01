<div class="grid_12">

    <?php echo $form->create('Titulo', array(
            'action' => 'guiaDelEstudiante',
            'name'=>'TituloSearchForm',
            'id' =>'TituloSearchForm',
            )) ?>
    <div class="grid_6 alpha">
    <?php echo $form->input('Titulo.que', array(
                'label'=> '�Qu�?',
                )) ?>
    </div>

    <div class="grid_6 omega">
    <?php echo $form->input('Titulo.donde', array(
                'label'=> '�D�nde?',
                )) ?>
    </div>
    
    <div class="grid_6">    
        <?php echo $form->end('Buscar') ?>
    </div>
    
</div>