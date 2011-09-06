<?php
    echo $javascript->link(array(
    'jquery.autocomplete',
    'jquery.loadmask.min',
    ));
    echo $html->css(array('jquery.loadmask', 'jquery.autocomplete', 'catalogo.advanced_search', 'catalogo.titulos'), null, array(), false);
?>
<script type="text/javascript">
    init('<?echo $html->url(array('controller'=>'localidades','action'=>'ajax_search_localidades'));?>');
</script>
<div class="grid_12 titulos search">
    
    <h1><?php __('B�squeda de T�tulos');?></h1>

    <div class="boxblanca inputs_largos">
        <h3>Seleccione criterios de b�squeda</h3>
        <?php
        echo $form->create('Titulo', array(
        'action' => 'search_results',
        'name'=>'TituloSearchForm',
        'id' =>'TituloSearchForm',
        )
        );
        ?>
        <div class="box_izquierda">
            <h4>Nivel y Sector</h4>
            <?php
                echo $form->input('oferta_id',array( 'div' => true,
                                                    'class' => 'autosubmit ',
                                                    'label'=> 'Nivel',
                                                    'id' => 'ofertaId',
                                                    'empty' => 'Seleccione',
                                                    'disabled'=> $bloquearOferta
                                                   ));
                if($bloquearOferta){
                    echo $form->input('oferta_id',array( 'type' => 'hidden'));
                }
                
                $meter = '<span id="ajax_indicator" style="display:none;">'.$html->image('ajax-loader.gif', array('style' => 'float:right; height: 19px;')).'</span>';

                echo $form->input('sector_id', array( 'div' => true,
                                                 'class' => 'autosubmit ',
                                                 'type'=>'select',
                                                 'empty'=>'Seleccione',
                                                 'options'=>$sectores,
                                                 'label'=>'Sector',
                                                 'id'=>'sectorId',
                                                 'after'=>$meter));

                echo $form->input('subsector_id', array( 'div' => true,
                                                        'class' => 'autosubmit ',
                                                        'empty' => 'Seleccione',
                                                        'type'=>'select',
                                                        'label'=>'Subsector',
                                                        'id'=>'subsectorId',
                                                        'after'=> $meter));

                echo $ajax->observeField('sectorId', array( 'url' =>'/subsectores/ajax_select_subsector_form_por_sector',
                                                            'update'=>'subsectorId',
                                                            'loading'=>'jQuery("#ajax_indicator").show();jQuery("#subsectorId").attr("disabled","disabled")',
                                                            'complete'=>'jQuery("#ajax_indicator").hide();jQuery("#subsectorId").removeAttr("disabled")',
                                                            'onChange'=>true ));

                
                echo $form->input('tituloName', array( 'label'=> 'Nombre del T�tulo',
                                                      'div' => true,
                                                      'class' => '',
                                                      'id' => 'TituloName', ));
                ?>
        </div>
        <div class="box_derecha">
            <h4>Localizaci�n</h4>
            <?php
            
            echo $form->input('Instit.jurisdiccion_id', array('label'=>'Jurisdicci�n',
                                                                  'div' => false,
                                                                  'class' => 'autosubmit ',
                                                                  'empty' => array('0'=>'Seleccione'),
                                                                  'id'=>'jurisdiccion_id'));
            echo '<span class="ajax_update" id="ajax_indicator" style="display:none; margin-top: -32px; float: right; clear: none">'.$html->image('ajax-loader.gif').'</span>';
                
            echo $form->input('jur_dep_loc', array('label'=>'Departamento/Localidad',
                                                    'div'=>false,
                                                    'class' => '',
                                                    'after'=>'<br /><i>Ingrese al menos 3 letras para que comience la b�squeda</i>'));
            $name = $val = '';
            if (!empty($this->data['Instit']['localidad_id'])) {
                $name = "data[Instit][localidad_id]"; $val =
                $this->data['Instit']['localidad_id'];
            } elseif (!empty($this->data['Instit']['departamento_id'])) {
                $name = "data[Instit][departamento_id]"; $val =
                $this->data['Instit']['departamento_id'];
            }
            ?>
            <input id="hiddenLocDepId" name="<?php echo $name?>" type="hidden" value="<?php echo $val?>" />
            
            <div class="clear" style="height:50px;"></div>
            
            <?php
            
            echo $form->submit('Buscar', array(
            'class' => 'boton-buscar',
            'style' => 'cursor: pointer; float:right; width:100px',
            'div' => false
            ));
            ?>

        </div>
        <div class="clear" style="height:15px;"></div>

        <?php
        echo $form->input('bysession', array('type'=>'hidden', 'value'=>$bySession));
        echo $form->input('busquedanueva', array('type'=>'hidden', 'value'=>'1'));

        echo $form->end();
        ?>
        <div class="clear"></div>
    </div>
    
    <!-- Aca se muestran los resultados de la busqueda-->
    <div id="consoleResult" style="min-height:200px; margin-top:15px; padding-bottom:20px;"></div>

</div>
<script type="text/javascript">
jQuery(document).ready(function() {
    <?php
    if ($bySession) {
    ?>
        jQuery("#TituloSearchForm").submit();
    <?php
    }
    ?>
});
</script>