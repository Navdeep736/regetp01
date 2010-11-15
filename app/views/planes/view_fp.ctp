
<?php
    /* @var $ajax AjaxHelper */
    $ajax;
    /* @var $form FormHelper */
    $form;
    /* @var $html HtmlHelper */
    $html;
    
echo $html->css('planes/view_fp', null, null, false);
echo $html->css(array('jquery.loadmask'));

$divOfertaFP = 'tabs-oferta-fp-'.$ciclo;

$paginator->options(array(
    'url' => $url_conditions,
    'update'=> $divOfertaFP,
    ));
?>
<div id="<?php echo $divOfertaFP; ?>" class="oferta-contanier">
    <?php
    if (empty($planes) && !$es_una_busqueda) {
    ?>
    <p class="msg-atencion"><br /><br />La Instituci�n no presenta actualizaciones para este a�o</p>
    <? 
    }
    else{

        echo $form->create(
                'Plan',
                array(
                    'id'=>'formPlanesViewFp',
                    'url' => '/planes/view_fp/'.$instit_id.'/'.$oferta_id.'/'.$ciclo,
                    'onsubmit' => 'return buscarPlanes(this);'
                    )
                );
        echo $form->input('Plan.nombre', array('label'=>'Nombre'));
        echo $form->input('Sector.id', array('label'=>'Sector',  'options'=> $sectores, 'empty'=>'Todos'));
        echo $form->end('Buscar');

        $sort = '';
       if(isset($this->passedArgs['sort'])){
               $sort = $this->passedArgs['sort'];
       }
       ?>

    <!--
    <h2>Ordenar Por:</h2>
    <ul class="lista_horizontal">
        <li class="<? echo ($sort == 'Plan.nombre')?'marcada':'';?>"><?php echo $paginator->sort('Nombre','Plan.nombre');?></li>
        <li class="<? echo ($sort == 'Sector.name')?'marcada':'';?>"><?php echo $paginator->sort('Sector','Sector.name');?></li>
    </ul>
    -->

    <?php
    if (empty($planes) && $es_una_busqueda) {
    ?>
    <p class="msg-atencion" style="height: 200px"><br /><br />B�squeda sin resultados</p>
    <?
    }
    else{
    ?>
    
    <div class="clear"></div>
    <br>
    <div>
    <?php
    $i = 0;
    if (!empty($planes)) {
        
        foreach ($planes as $plan):
            //debug($plan);
            $class = '';
            if ($i++ % 2 == 0) {
                $class = 'altrow';
            }
            $ciclo_plan = '';
            if($ciclo == 0){
                if (!empty($plan['Anio'][0]['ciclo_id']) && $ciclo==0) {
                    $primer_anio = current($plan['Anio']);
                    $ciclo_plan =  (!empty($primer_anio)? $primer_anio:"") ;
                }
            }

            echo $this->element('planes/plan_resumen_para_listado', array(
                'class' => $class,
                'plan'  => $plan,
                'ciclo' => $ciclo_plan,
            ));            
         endforeach;
    ?>
    <div class="navigation"></div>
    <div id="paginator_prev_next_links">
            <?php
            if($paginator->numbers()){
                    echo $paginator->prev('� Anterior ',null, null, array('class' => 'disabled'));
                    echo " | ".$paginator->numbers(array('modulus'=>'9'))." | ";
                    echo $paginator->next(' Siguiente �', null, null, array('class' => 'disabled'));
            }
            ?>
    </div>
    <?php
            }
    ?>
    </div>
    <?php
        }
    }
    ?>
</div>

<script language="JavaScript"  type="text/javascript" defer="defer">

    function buscarPlanes(formElement){
        
        var options = {
            target:        '.oferta-contanier',   // target element(s) to be updated with server response
            beforeSubmit:  blockResultConsole,  // pre-submit callback
            success:       unblockResultConsole,  // post-submit callback
            url:  formElement.action     // override for form's 'action' attribute
        };

        jQuery(formElement).ajaxSubmit(options);

        return false;        
    }
    
    function blockResultConsole(formData, options) {
        jQuery('.oferta-contanier').mask('Buscando');
    }

    function unblockResultConsole(responseText, statusText, xhr, $form)  {
        jQuery('.oferta-contanier').unmask();
    }
    
</script>
