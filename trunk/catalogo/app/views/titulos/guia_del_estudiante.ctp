<?php echo $javascript->link('jquery/jquery.tmpl.min', false); ?>
<?php echo $javascript->link('jquery/jquery.history', false); ?>



<!-- 
Inicializacion de url global para el manejo de los callbacks 
y funciones javascript de esta pagina 
-->
<script type="text/javascript">
    var urlDomain = "<?php echo $html->url('/')?>";
</script>

<!-- 
Templates de jQuery para los resultados de busqueda
-->
<script id="tituloTemplate" type="text/x-jquery-tmpl">
    <li titulo-id="${Titulo.id}">
            <input type="checkbox" name="data[Plan][titulo_id][]" value="${Titulo.id}" >
            <b>${Titulo.name}</b> (${Oferta.name})            
    </li>
</script>


<script id="institTemplate" type="text/x-jquery-tmpl">
    <li>
        <b>${Instit.cue}${Instit.anexo}</b> ${Instit.nombre_completo}
    </li>
</script>



<div id="filtro" class="grid_12">
    <div class="grid_6 alpha">
    <?php echo $form->create('Titulo', array(
            'action' => 'guia_del_estudiante',
            'name'=>'TituloSearchForm',
            'id' =>'TituloSearchForm',
            )) ?>
    
    <?php echo $form->input('Titulo.tituloName') ?>
    <?php echo $form->input('Titulo.oferta_id') ?>
    </div>
    
    <div class="grid_6 alpha">
    <?php echo $form->input('Titulo.sector_id', array('options'=>$sectores, 'multiple'=>true)) ?>
    
    <?php echo $form->end('Buscar') ?>
    </div>
    
</div>


<?php echo $form->create('Instit', array(
            'action'=>'guia_del_estudiante', 
            'id'=>'InstitSearchForm', 'name'=>'InstitSearchForm' ));
?>
<div id="li_titulos" class="grid_6 alpha">
    
    <h2>�Qu� Estudiar?</h2>
    <p style="display: none"><b></b> T�tulos o Certificados encontrados</p>
    <ul></ul>    
</div>
<?php echo $form->end(); ?>




<div id="li_instits" class="grid_6 omega">
    <h2>�D�nde Estudiar?</h2>
    <p style="display: none"><b></b> Instituciones encontradas</p>
    <ul></ul>
</div>



<?php echo $javascript->link('views/titulos/guia_del_estudiante_tail'); ?>

