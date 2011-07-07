<?php echo $html->css('catalogo.default_header', false) ?>

<div id="header">
    <div class="header_wrapper">
        <div id="header_title" class="container_12">

            <a href="<?php echo $html->url('/')?>"class="logo no-print grid_3">
                <?php echo $html->image('../css/img/logo.png', array(
                    'border'=> 0,
                    'class' => 'logo',
                    'style' => 'float: left',
                    )); 
                ?>
            </a>


            <h1 class="grid_6">
                &nbsp;<?php echo $html->link(__('Cat�logo Nacional de T�tulos y Certificaciones de Educaci�n T�cnico Profesional', true), '/pages/home', array('class' => 'logo')); ?>
            </h1>

        </div>
    </div>


    <div class="menu_wrapper no-print"  style="z-index: 1; ">
        <div class="container_12">
            <?php echo $this->element('menu');?>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="clear"></div>