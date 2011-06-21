<?php

header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0"); // // HTTP/1.1
header("Pragma: no-cache");
header("Expires: Mon, 17 Dec 2007 00:00:00 GMT"); // Date in the past

/* @var $html HtmlHelper */
$html;
/* @var $javascript JavascriptHelper */
$javascript;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <?php echo $html->charset(); ?>

        <title>
            <?php
            if (!empty($title_for_layout)) {
                echo  $title_for_layout;
                echo Configure::read('version')." - ";
            } ?>
            <?php __('Cat�logo Nacional de T�tulos y Certificaciones de Educaci�n T�cnico Profesional'); ?>
        </title>

        <script type="text/javascript">

            // URL global que apunta al path de mi sitio, sirve para hacer llamadas
            // ajax a controlador/action sin problema utilizando:
            // urlDomain+'controlador/action'
            var urlDomain = "<?php echo $this->base?>";


            // Edit to suit your needs.
            var ADAPT_CONFIG = {
                // Where is your CSS?
                path: "<?php echo $html->url('/css/adapt/'); ?>",

                // false = Only run once, when page first loads.
                // true = Change on window resize and page tilt.
                dynamic: false,

                // First range entry is the minimum.
                // Last range entry is the maximum.
                // Separate ranges by "to" keyword.
                range: [
                    '760px  to 980px  = 720.min.css',
                    '980px  to 1920px = 960.min.css'
                ]
            };





        </script>
        <?php
        echo $html->meta('icon');

        //echo $html->css('adapt/mobile.min','stylesheet', array('media'=>'mobile'));
        //echo $html->css('adapt/master');
        echo $html->css('jquery.tooltip','stylesheet');
        echo $html->css('catalogo','stylesheet', array('media'=>'screen'));
        echo $html->css('catalogo.menu','stylesheet');
        echo $html->css('ui-redmond/jquery-ui-1.8.12.custom','stylesheet');
        echo $html->css('printer','stylesheet', array('media'=>'print'));
        echo $html->css('iconize','stylesheet');
        echo $html->css('catalogo800x600',
                        'stylesheet', array(
                            'media' => 'screen and (max-width: 960px)'
                            ));

        echo $javascript->link(array(
        'jquery-1.5.2.min',
        'adapt.min.js',
        'jquery.form',
        'jquery.tools.min',
        'jquery-ui-1.8.12.custom.min',
        'jquery/jquery.bgiframe.min',
        'jquery/jquery.superfish',
        'jquery/jquery.history',
        ));

        $jsPoner = 'views'.DS.Inflector::underscore($this->name).DS.$this->action;
        $jsView = WWW_ROOT.'js'.DS.$jsPoner;
        if (file_exists($jsView.'.js')) {
            echo $javascript->link($jsPoner);
        }

        echo $scripts_for_layout;

        ?>

		<script type="text/javascript" src="http://brandon.jquery.com/firebuglite/firebug.js"></script>


        <!--[if IE 6]>
        <?php echo $html->css('catalogo_ie_fix');?>
        <![endif]-->
        
        <script type="text/javascript">
            jQuery(document).ajaxError( function(event, jqXHR, ajaxSettings, thrownError){
                if (xhr.status == 401){
                    // primero pregunta, antes de hacer un reload
                    // no vaya a ser cosa que pierda lo que estaba haciendo
                    if ( confirm('Ha caducado su sesi�n, �desea ingrear nuevamente al sistema?') ) {
                        window.location.reload(true);
                    }
                }                
            } );
        </script>

    </head>
    <body>
        <div class="wrapper">
            <div id="header">
            <div class="header_wrapper">
                <div id="header_title" class="container_12">                    
                    <div class="grid_12">
                        <a href="<?php echo $html->url('/')?>">
                            <div id="logo" class="grid_3 alpha">
                                <?php echo $html->image('../css/img/logo.png', array('border'=>0)); ?>
                            </div>
                        </a>
                        <div id="head-text" class="grid_9 omega">
                            <h1 class="grid_6 alpha prefix_1">
                                <?php echo $html->link(__('Cat�logo Nacional de T�tulos y Certificaciones de Educaci�n T�cnico Profesional', true), '/pages/home'); ?>
                            </h1>
                            <div class="clear"></div>

                            <?php echo $this->element('menu');?>


                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            </div>

            <?php $session->flash(); ?>
            <?php $session->flash('auth'); ?>
            <div id="container" class ="container_12">
                <?php echo $content_for_layout; ?>
            </div> <!-- FIN div #container -->

            <div class="clear" style="height: 30px;"></div>
            <div id="footer">
                <div class="sponsors">
                    <?php
                    echo $html->link($html->image('links/fondoblanco/encuentro.png'),'http://www.encuentro.gov.ar/',null, null, false);
                    echo $html->link($html->image('links/fondoblanco/pakapaka.png'),'http://www.pakapaka.gov.ar/',null, null, false);
                    echo $html->link($html->image('links/fondoblanco/educar.png'),'http://www.educ.ar/',null, null, false);
                    echo $html->link($html->image('links/fondoblanco/infd.png'),'http://www.me.gov.ar/infod/',null, null, false);
                    echo $html->link($html->image('links/fondoblanco/biblo.png'),'http://www.bnm.me.gov.ar/',null, null, false);
                    echo $html->link($html->image('links/fondoblanco/logo_mercosur.png'),'http://www.sic.inep.gov.br/',null, null, false);
                    echo $html->link($html->image('links/fondoblanco/bicentenario.png'),'http://www.bicentenario.argentina.ar/',null, null, false);
                    echo $html->link($html->image('links/fondoblanco/argentina.png'),'http://www.argentina.ar/',null, null, false);
                    echo $html->link($html->image('links/fondoblanco/argentinagovar.png'),'http://www.argentina.gov.ar/',null, null, false);
                    ?>
                </div>
                <p>
                    Saavedra 789 C1229ACE | Tel�fono (011) 4129-2000
                </p>
            </div>


            <?php echo $cakeDebug; ?>
        </div>


    </body>

</html>
