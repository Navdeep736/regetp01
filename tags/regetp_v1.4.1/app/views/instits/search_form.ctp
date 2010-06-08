
<h1><?= __('Buscar Instituci�n')?></h1>

<div>
    <?= $form->create('Instit',array('action' => 'search','name'=>'InstitSearchForm'));?>

    <?= $form->input('cue', array('label'=> 'CUE', 'maxlength'=>9 ,'after'=> '<cite>Ej: 600118 o 5000216. Tambi�n puede buscar con el n� de anexo, Ej: 60011800 </cite>')); ?>

    <?php echo $form->input('nombre_completo', array('label'=>'Nombre',
    'after'=> '<cite>Realiza una b�squeda por tipo de establecimiento, n�mero y nombre propio de la instituci�n.<br>Ej: Escuela 3 San Mart�n</cite>'));?>

    <?php
    // 		JURISDICCION
    $meter = '<span class="ajax_update" id="ajax_indicator" style="display:none;">'.$html->image('ajax-loader.gif').'</span>';
    echo $form->input('jurisdiccion_id', array('empty' => array('0'=>'Todas'),'id'=>'jurisdiccion_id','label'=>'Jurisdicci�n','after'=>$meter));
    ?>

    <!-- ?= $form->button('Buscar',array('onclick'=>'enviar()'));? -->
    <?php echo $form->submit('Buscar', array('style'=>' display: block;				        font-weight: bold;',
    'onClick' => 'enviar()'
    )
    );
    ?>

    <!--
				BUSQUEDA POR SU UBICACION
		-->
    <div class="boton-para-div-oculto"><a href="#VerUbicacion" onclick="$('search-ubicacion').toggle()">por su ubicaci�n</a></div>
    <div id="search-ubicacion" class="search-div" style="display: none">

        <div id="departamento-select" style="padding-left:0px;">
            <?php
            // 		DEPARTAMENTO
            $meter = '<span class="ajax_update" id="ajax_indicator_dpto" style="display:none;">'.$html->image('ajax-loader.gif').'</span>';
            echo $form->input('Departamento.id', array('type'=> 'select','options'=>$departamentos ,'empty' => 'Seleccione','label'=>'Departamento','after'=> $meter.'<br><cite>Seleccione una jurisdicci�n para filtrar los Departamentos</cite>'));

            echo $ajax->observeField('jurisdiccion_id',
            array(  	'url' => '/departamentos/ajax_select_departamento_form_por_jurisdiccion',
            'update'=>'DepartamentoId',
            'loading'=>'$("ajax_indicator").show();$("DepartamentoId").disable();$("LocalidadId").update();',
            'complete'=>'$("ajax_indicator").hide();$("DepartamentoId").enable(); $("departamento-select").show();',
            'onChange'=>true
            ));
            ?>
            <script type="text/javascript">
                //		Event.observe(window,'load',function(){
                //			new Ajax.Updater('DepartamentoId', '<?php echo $html->url(array('controller'=>'departamentos','action'=>'ajax_select_departamento_form_por_jurisdiccion'));?>');
                //		});
            </script>
        </div>

        <div id="localidad-select" style="padding-left:0px;">
            <?php
            //		LOCALIDAD
            echo $form->input('Localidad.id', array('empty' => 'Seleccione','options'=>$localidades,'type'=>'select','label'=>'Localidad','after'=>'<br><cite>Seleccione un Departamento para filtrar las Localidades.</cite>'));
            echo $ajax->observeField('DepartamentoId',
            array(  	'url' => '/localidades/ajax_select_localidades_form_por_departamento',
            'update'=>'LocalidadId',
            'loading'=>'$("ajax_indicator_dpto").show();$("LocalidadId").disable()',
            'complete'=>'$("ajax_indicator_dpto").hide();$("LocalidadId").enable(); $("localidad-select").show();',
            'onChange'=>true
            ));

            echo $ajax->observeField('jurisdiccion_id',
            array(  	'url' => '/localidades/ajax_select_localidades_form_por_jurisdiccion',
            'update'=>'LocalidadId',
            'loading'=>'$("ajax_indicator").show();$("LocalidadId").disable()',
            'complete'=>'$("ajax_indicator").hide();$("LocalidadId").enable();',
            'onChange'=>true
            ));

            ?>

            <script type="text/javascript">
                //	Event.observe(window,'load',function(){
                //		new Ajax.Updater('LocalidadId', '<?php echo $html->url(array('controller'=>'localidades','action'=>'ajax_select_localidades_form_por_departamento'));?>');
                //	});
            </script>
        </div>

        <?php echo $form->input('direccion', array('label'=>'Domicilio')); ?>

        <?php echo $form->button('Buscar',array('onclick'=>'enviar()'));?>

    </div>



    <!--
				BUSQUEDA POR SU NOMBRE 
		-->
    <div class="boton-para-div-oculto"><a href="#VerDenominacion" onclick="$('search-denominacion').toggle()">por su nombre</a></div>
    <div id="search-denominacion"  class="search-div" style="display: none">
        <?php
        echo $form->input('tipoinstit_id', array(	'empty' => 'Todos','type'=>'select',
        'label'=>'Tipo de Establecimiento','after'=> '<br /><cite>Para activar este campo, seleccione primero una jurisdicci�n</cite>'));

        echo $ajax->observeField('jurisdiccion_id',
        array(  	'url' => '/tipoinstits/ajax_select_form_por_jurisdiccion',
        'update'=>'InstitTipoinstitId',
        'loading'=>'$("ajax_indicator").show();$("InstitTipoinstitId").disable()',
        'complete'=>'$("ajax_indicator").hide();$("InstitTipoinstitId").enable()',
        'onChange'=>true
        ));

        echo $form->input('nroinstit', array('label'=>'N�mero'));

        echo $form->input('nombre', array('label'=>'Nombre del Establecimiento','after'=> '<cite>Ej: "Sarmiento" o "Gral. Belgrano". No confundir el nombre con el tipo de establecimiento</cite>'));

        echo $form->button('Buscar',array('onclick'=>'enviar()'));
        ?>
    </div>




    <!--
				BUSQUEDA POR SU OFERTA
		-->
    <div class="boton-para-div-oculto"><a href="#VerPlanes" onclick="$('search-planes').toggle()">por su oferta</a></div>
    <div id="search-planes"  class="search-div" style="display: none">
        <?php
        echo $form->input('Plan.oferta_id',array('options'=>$ofertas,
        'empty'=>'Seleccione',
        'label'=>'Con Oferta'));

        $type = 'hidden';
        // esto solo lo ven los editores y los administradores
        if($session->read('Auth.User.role') == 'editor' || $session->read('Auth.User.role') == 'admin' || $session->read('Auth.User.role') == 'desarrollo') {
            $type = 'text'; //lo muestra como un imputo comun
        }

        echo $form->input('Plan.sector_id',array(
        'label'=>'Sector',
        'options'=>$sectores,
        'empty'=>'Seleccione'
        ));

         if($session->read('Auth.User.role') == 'editor'||
                $session->read('Auth.User.role') == 'admin' ||
                $session->read('Auth.User.role') == 'desarrollo') {

                 echo $form->input('Plan.subsector_id',array(
                'label'=>'Subsector',
                'empty'=>'Seleccione',
                ));

                 echo $ajax->observeField('PlanSectorId',
            array(  	'url' => '/subsectores/ajax_select_subsector_form_por_sector',
            'update'=>'PlanSubsectorId',
            'loading'=>'$("PlanSubsectorId").disable();',
            'complete'=>'$("PlanSubsectorId").enable();',
            'onChange'=>true
            ));

                echo $form->input('Instit.orientacion_id',array(
                'label'=>'Orientaci�n',
                'empty'=>'Seleccione',
                ));


                 echo $form->input('Plan.titulo_id',array(
                    'label'=>'T�tulo de Referencia',
                    'options'=>$titulos,
                    'empty'=>'Seleccione',
                ));
        }

        
        echo $form->input('Plan.norma',array(
        'label'=>'Normativa'
        ));
        ?>

        <?php echo $form->button('Buscar',array('onclick'=>'enviar()'));?>
    </div>




    <!--
				BUSQUEDA POR OTRAS CARACTERISTICAS
		-->

    <div class="boton-para-div-oculto"><a href="#VerOtros" onclick="$('search-otros').toggle()">por otras caracter�sticas</a></div>

    <div id="search-otros"  class="search-div" style="display: none">
        <?php

        echo $form->input('etp_estado_id', array('empty' => 'Todas', 'label'=> 'Relaci�n con ETP'));

        echo $form->input('claseinstit_id', array('empty' => 'Todas', 'label'=> 'Tipo de Instituci�n de ETP'));

        echo $form->input('gestion_id', array('empty' => 'Todas', 'label'=> '�mbito de Gesti�n'));

        echo $form->input('dependencia_id', array('empty' => 'Todas','label'=>'Tipo de Dependencia'));

        // no hay busqueda por anexo
        //$array_anexo = array('-1'=>'Buscar Todas','0'=>'No','1'=>'Si');
        //echo $form->input('esanexo',array('options'=> $array_anexo,'label'=>'Anexo'));

        $array_activa = array('-1'=>'Buscar Todas','0'=>'No','1'=>'Si');
        echo $form->input('activo',array('options'=> $array_activa,
        'label'=>'Instituci�n Ingresada al RFIETP'));
        ?>
        <?php echo $form->button('Buscar',array('onclick'=>'enviar()'));?>
    </div>

    <?php echo $form->end(); ?>

</div>


<!-- 
	 Con este script hago que cuando se pulse ENTER 
	 se envie el formulario 
-->

<? 
// con esto agrego la funcionalidad para que al preswionar ENTER me envie el formulario
//echo $javascript->link('form_regetp_ria');?>
<script type="text/javascript">
    <!--

    Event.observe(window, "keypress", function(e){
        var cKeyCode = e.keyCode || e.which;
        if (cKeyCode == Event.KEY_RETURN){
            $('InstitSearchForm').submit();
        }
    });


    function enviar()
    {
        if($('search-ubicacion').visible() == false){
            $('DepartamentoId').value = '';
            $('LocalidadId').value = '';
            $('InstitDireccion').value = '';
        }

        if($('search-denominacion').visible() == false){
            $('InstitTipoinstitId').value = '';
            $('InstitNroinstit').value = '';
            $('InstitNombre').value = '';
        }

        if($('search-planes').visible() == false){
            $('PlanOfertaId').value = '';
            $('PlanSectorId').value = '';
        }

        if($('search-otros').visible() == false){
            $('InstitGestionId').value = '';
            $('InstitDependenciaId').value = '';
            $('InstitActivo').value = '';
            $('InstitClaseinstitId').value =''	;
            $('InstitEtpEstadoId').value =''	;

        }

        $('InstitSearchForm').submit();
    }

    //-->
</script>
