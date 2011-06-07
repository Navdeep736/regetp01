<ul class="nav grid_8 alpha prefix_1 sf-menu">
        <li class="<?php echo ($this->here == $this->base.'/pages/home')?'current':''?> "><?php echo $html->link('Inicio', '/pages/home', array('class'=>'menu-item')); ?></li>


        <?php 
        $activo = false;
        if ($this->action == 'search' || $this->action == 'search_form' || $this->action == 'guiaDelEstudiante'){
            $activo = true;
        }
        ?>
        <li class="<?php echo ($activo)?'current':''?>">
            <a class='menu-item' href="">Buscadores</a>
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
        </li>

        <li class="<?php echo (strstr($this->here,$this->base.'/pages') && ($this->here != $this->base.'/pages/home'))?'current':''?> ">
            <?php echo $html->link('Documentaci�n', array('controller'=>'pages', 'action'=>'introduccion'), array('class'=>'menu-item')); ?>
            <ul>
                <li>
                    <?php echo $html->link('Informaci�n Sectorial','#')?>
                    <ul>
                        <li><?php echo $html->link('Familias Profesionales','/pages/familias')?></li>
                        <li><?php echo $html->link('Foros Sectoriales','/pages/foros')?></li>
                        <li><?php echo $html->link('Entidades Participantes','/pages/entidades')?></li>
                    </ul>
                </li>
                <li><?php echo $html->link('Proceso de Homologaci�n','/pages/homologacion')?></li>
                <li><?php echo $html->link('Marcos de Referencia','/pages/marcos')?></li>

                <li>
                    <?php echo $html->link('Niveles y Modalidades','#')?>
                    <ul>
                        <li><?php echo $html->link('Educaci�n T�cnica de Nivel Medio y Superior','/pages/mediaysuperior')?></li>
                        <li><?php echo $html->link('Formaci�n Profesional','/pages/fp')?></li>
                    </ul>
                </li>

                <li><?php echo $html->link('Normativa de Referencia','/pages/normativa')?></li>

            </ul>
        </li>
        <li class="<?php echo (strstr($this->here,$this->base.'/correos/contacto'))?'current':''?>">
            <?php echo $html->link('Contacto', array(
                                                'controller' => 'correos',
                                                'action'    => 'contacto'),
                                                array('class'=>'menu-item'))?>
        </li>
</ul>