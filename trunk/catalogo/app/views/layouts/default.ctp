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
            <?php __('Cat�logo Nacional de T�tulos y Certificados');
            echo Configure::read('version')." - "; ?>
            <?php echo $title_for_layout; ?>
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
            '760px            = mobile.min.css',
            '760px  to 980px  = 720.min.css',
            '980px  to 1280px = 960.min.css',
            '1280px to 1600px = 1200.min.css',
            '1600px to 1920px = 1560.min.css',
            '1920px           = fluid.min.css'
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
        echo $html->css('ui-redmond/jquery-ui-1.8.12.custom');
        echo $html->css('printer','stylesheet', array('media'=>'print'));

        echo $javascript->link(array(
        'jquery-1.5.2.min',
        'adapt.min.js',
        'jquery.form',
        'jquery.tools.min',
        'jquery-ui-1.8.12.custom.min',
            'jquery/jQueryRotateCompressed.2.1',
        ));

        $jsPoner = 'views'.DS.Inflector::underscore($this->name).DS.$this->action;
        $jsView = WWW_ROOT.'js'.DS.$jsPoner;
        if (file_exists($jsView.'.js')) {
             echo $javascript->link($jsPoner);
        }

        echo $scripts_for_layout;

        ?>
        
        
    </head>
    <body>
        
    
    <div class="wrapper">
        <div id="header">
            <div id="header-left-fluid"></div>
             <div id="header-right-fluid"></div>
            
            <div id="header_title" class="container_12">
                
                <h2 id="logo" class="grid_3">INET</h2>
                
                <div id="head-text" class="grid_9">
                    <h1>
                        <?php echo $html->link(__('Cat�logo Nacional de T�tulos y Certificados', true), '/pages/home', array('class' => 'uppercase')); ?>
                    </h1>
                    <div class="clear"></div>
                    <ul id="nav" class="grid_8">
                        <li class="grid_2 <?php echo ($this->here == $this->base.'/pages/home')?'current':''?> alpha"><?php echo $html->link('Inicio', '/pages/home'); ?></li>
<!--                        <li class="grid_2 <?php echo (strstr($this->here,$this->base.'/titulos'))?'current':''?>">
                            <a href="">Buscadores</a>
                            <ul>
                                <li>
                                    <?php echo $html->link('Gu�a del Estudiante', array(
                                                    'controller' => 'titulos',
                                                    'action' => 'guiaDelEstudiante'
                                    )) 
                                        ?>
                                </li>
                                <li>
                                    <?php echo $html->link('Instituciones', array(
                                                    'controller' => 'instits',
                                                    'action' => 'search_form'
                                    )) 
                                        ?>
                                </li>
                                <li>
                                    <?php echo $html->link('T�tulos', array(
                                                    'controller' => 'titulos',
                                                    'action' => 'search'
                                    )) 
                                        ?>
                                </li>
                            </ul>
                        </li>-->
                        <li class="grid_2 <?php echo (strstr($this->here,$this->base.'/bibliotecas'))?'current':''?> ">
                            <?php echo $html->link('Documentaci�n', array('controller'=>'bibliotecas', 'action'=>'index')); ?>
                            <ul>
                                <li><a href="#1">Marco de Referencias</a></li>
                                <li><a href="#2">Foros Sectoriales</a></li>
                                <li><a href="#2">Cara de Bragueta</a></li>
                            </ul>
                        </li>
                        <li class="grid_2 omega <?php echo (strstr($this->here,$this->base.'/correos/contacto'))?'current':''?>">
                            <?php echo $html->link('Contacto', array(
                                                                'controller' => 'correos',
                                                                'action'    => 'contacto'
                            ))?>
                        </li>
                    </ul>
                </div>
                
                <div class="clear"></div>
                
                
                
                
            </div>
            
        </div>
        
        
       <div id="container" class ="container_12">
                        <?php $session->flash(); ?>
                        <?php $session->flash('auth'); ?>
           
                        <?php echo $content_for_layout; ?>           
       </div> <!-- FIN div #container -->
                    
       <div class="clear"></div>
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
