<?php 
echo $html->css('catalogo.home.css');
echo $javascript->link(array('jquery.animate-colors-min'));
?>
<script type="text/javascript">
    jQuery(document).ready(function() {

	jQuery(".buscadores li").hover(function() {
                
		var thumbOver = jQuery(this).find("img").attr("src");

                jQuery(this).find("a.thumb").css({'background' : 'url(' + thumbOver + ') no-repeat center bottom'});

		jQuery(this).find("span").stop().fadeTo('fast', 0 , function() {
			jQuery(this).hide();
		});

                jQuery(this).find(".description p").animate({color: '#000000'}, 'fast');
                jQuery(this).find("h2").animate({backgroundColor: '#1E8DDB'}, 'fast');
	} , function() { 
		jQuery(this).find("span").stop().fadeTo('fast', 1).show();

                jQuery(this).find("h2").animate({backgroundColor: '#858789'}, 'fast');
                jQuery(this).find(".description p").animate({color: '#858789'}, 'fast');
	});
    });
</script>

<ul class="buscadores grid_12">
    <?php
        echo $html->image('home/buscadores.png',array('style'=>'float:right;position:absolute;margin-top:-20px;z-index:9999;margin-left:-191px'));
    ?>
    <div class="grid_12">
            <h2>Busquedas Generales</h2>
    </div>
    <li class="grid_4 alpha" >
        <?php
            echo $html->link('<span>'.$html->image('home/guia_small.png').'</span>',array('controller'=>'instits', 'action'=>'search_form'), array('escape'=>false, 'class'=>'thumb'));
        ?>
        <h2>
            <?php
                echo $html->link('Gu�a del Estudiante', array('controller'=>'titulos', 'action'=>'search_form'));
            ?>
        </h2>
        <div class="description">
            <p>Utiliz� este buscador si lo que estas buscando son T�tulos o Certificados</p>
        </div>
        
    </li>
    <li class="grid_4">
            <?php
                echo $html->link('<span>'.$html->image('home/guia_small.png').'</span>',array('controller'=>'instits', 'action'=>'search_form'), array('escape'=>false, 'class'=>'thumb'));
            ?>
            <h2>
                <?php
                    echo $html->link('Buscador de Instituciones', array('controller'=>'instits', 'action'=>'search_form'), array('escape'=>false));
                ?>
            </h2>
            <div class="description">
                <p>Utiliz� este buscador si lo que estas buscando son T�tulos o Certificados</p>
            </div>
            
    </li>
    <li class="grid_4 omega">
            <?php
                echo $html->link('<span>'.$html->image('home/guia_small.png').'</span>',array('controller'=>'instits', 'action'=>'search_form'), array('escape'=>false, 'class'=>'thumb'));
            ?>
            <h2>
                <?php
                    echo $html->link('Buscador de T�tulos', array('controller'=>'instits', 'action'=>'search_form'));
                ?>
            </h2>
            <div class="description">
                <p>Utiliz� este buscador si lo que estas buscando son T�tulos o Certificados</p>
            </div>
            
    </li>
</ul>
<ul class="buscadores grid_12">
    <?php
        echo $html->image('home/buscadores.png',array('style'=>'float:right;position:absolute;margin-top:-20px;z-index:9999;margin-left:-191px'));
    ?>
    <div class="grid_12">
            <h2>Busquedas por Oferta</h2>
    </div>
    <li class="grid_4 alpha">
            <?php
                echo $html->link('<span>'.$html->image('home/guia_small.png').'</span>',array('controller'=>'instits', 'action'=>'search_form'), array('escape'=>false, 'class'=>'thumb'));
            ?>
            <h2>
                <?php
                    echo $html->link('Formaci�n Profesional', array('controller'=>'instits', 'action'=>'search_form'));
                ?>
            </h2>
            <div class="description">
                <p>�Estas buscando que estudiar y no sabes que? Este buscador te guiar� en tu busqueda</p>
            </div>
    </li>
    <li class="grid_4">
        <?php
            echo $html->link(
                    '<span>'.$html->image('home/guia_small.png').'</span>',
                    array('controller'=>'titulos', 'action'=>'search_form'),
                    array('escape'=>false, 'class'=>'thumb'));
        ?>
        <h2>
            <?php
                echo $html->link('Secundario T�cnico', array('controller'=>'titulos', 'action'=>'search_form'));
            ?>
        </h2>
        <div class="description">
            <p>Utiliz� este buscador si lo que estas buscando son T�tulos o Certificados</p>
        </div>
    </li>
    <li class="grid_4 omega">
            <?php
                echo $html->link('<span>'.$html->image('home/guia_small.png').'</span>',array('controller'=>'instits', 'action'=>'search_form'), array('escape'=>false, 'class'=>'thumb'));
            ?>
            <h2>
                <?php
                    echo $html->link('Superior T�cnico', array('controller'=>'instits', 'action'=>'search_form'), array('escape'=>false));
                ?>
            </h2>
            <div class="description">
                <p>Utiliz� este buscador para encontrar una instituci�n en particular</p>
            </div>
    </li>
</ul>
<div class="grid_12">
        <h2>More Info</h2>
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum arcu in tellus commodo vestibulum. Aliquam erat volutpat. Cras elementum justo vitae metus consequat in condimentum nunc ultrices. Nam mollis bibendum volutpat. Donec velit ante, varius euismod pulvinar eu, hendrerit eget tellus. Aenean sed euismod augue. Aenean sollicitudin ligula et lorem feugiat vel accumsan sapien porta. Integer mollis ultricies felis non porttitor. Donec fermentum blandit ante vel tempus. Donec pulvinar, magna non aliquet egestas, nulla urna facilisis tortor, vel volutpat leo lorem ultrices odio. Cras lacinia aliquet placerat. Integer luctus massa quis massa blandit ac scelerisque neque dignissim. In iaculis vulputate ligula, sit amet mattis felis cursus eu. Proin iaculis nisi sit amet neque rhoncus vitae tempus lectus ornare. Aliquam in neque mauris.
        <br/>
</div>


<div class="clear"></div>