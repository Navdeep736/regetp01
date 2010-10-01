
<?
echo $javascript->link(array(
    'jquery.autocomplete',
    'jquery.loadmask.min',
    'views/instits/search_form',
        ));

echo $html->css(array('jquery.loadmask'));
?>

<h1><? __('B�squeda de Instituciones')?></h1>


<div>
    <?php
    echo $form->create('Instit', array(
        'action' => 'search',
        'name'=>'InstitSearchForm',
        'id' =>'InstitSearchForm',
        )
    );

    echo $form->hidden('form_name',array('value'=>'buscador rapido'));

    echo $form->input('jurisdiccion_id',array(
            'label'=>'Jurisdicci�n',
            'empty'=>'TODAS',
            'after' => '<br><cite>Filtro opcional. Si no selecciona una Jurisdicci�n se realizar� una b�squeda en todo el Registro.</cite>'
            ));
    
    echo $form->input('busqueda_libre', array(
            'style'=>'border:1px solid #BBBBBB; width: 99%; font-size: 22px; height: 29px; color: rgb(117, 117, 117);',
            'label'=> 'CUE � Nombre de la Instituci�n',
            'title'=> 'Ingrese CUE � Nombre de la instituci�n en forma completa � parcial. Ej: 600118, 5000216 � Manuel Belgrano.',
            ));



    echo $html->link('realizar una b�squeda avanzada...','advanced_search_form',array(
        'class'=>'link_right small',
        'style'=>'margin-bottom: -18px; padding:0px; margin-right: 4px;'
    ));



    echo $form->end('Buscar');
    
    ?>

    <!-- Aca se muestran los resultados de la busqueda-->
    <div id='consoleResultWrapper'  style="margin-top: 20px;">
        <div id='consoleResult' style="min-height: 200px; margin-bottom: 20px;"></div>
    </div>
    
</div>
