<ul class="nav grid_8 alpha prefix_1">
        <li class="grid_2 <?php echo ($this->here == $this->base.'/pages/home')?'current':''?> alpha"><?php echo $html->link('Inicio', '/pages/home'); ?></li>


        <?php 
        $activo = false;
        if ($this->action == 'search' || $this->action == 'search_form' || $this->action == 'guiaDelEstudiante'){
            $activo = true;
        }
        ?>
        <li class="grid_2 <?php echo ($activo)?'current':''?>">
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
        </li>

        <li class="grid_2 <?php echo (strstr($this->here,$this->base.'/docs'))?'current':''?> ">
            <?php echo $html->link('Documentaci�n', array('controller'=>'docs', 'action'=>'introduccion')); ?>
            <ul>
                <li>
                    <?php echo $html->link('Informaci�n Sectorial','#')?>
                    <ul>
                        <li><?php echo $html->link('Familias Profesionales','/docs/familias')?></li>
                        <li><?php echo $html->link('Foros Sectoriales','/docs/foros')?></li>
                        <li><?php echo $html->link('Entidades Participantes','/docs/entidades')?></li>
                    </ul>
                </li>
                <li><?php echo $html->link('Proceso de Homologaci�n','/docs/homologacion')?></li>
                <li><?php echo $html->link('Marcos de Referencia','/docs/marcos')?></li>

                <li>
                    <?php echo $html->link('Niveles y Modalidades','#')?>
                    <ul>
                        <li><?php echo $html->link('Educaci�n T�cnica de Nivel Medio y Superior','/docs/mediaysuperior')?></li>
                        <li><?php echo $html->link('Formaci�n Profesional','/docs/fp')?></li>
                    </ul>
                </li>

                <li><?php echo $html->link('Normativa de Referencia','/docs/normativa')?></li>

            </ul>
        </li>
        <li class="grid_2 omega <?php echo (strstr($this->here,$this->base.'/correos/contacto'))?'current':''?>">
            <?php echo $html->link('Contacto', array(
                                                'controller' => 'correos',
                                                'action'    => 'contacto'
            ))?>
        </li>
</ul>