<div class="grid_12">
    <h1>Mapa del sitio</h1>

    <div class="boxblanca boxdocs"> 
        <ul>
            <li><?php echo $html->link('Inicio', array('controller' => 'pages', 'action' => 'home')); ?></li>
            <li><?php echo $html->link('El Instituto Nacional de Educaci�n Tecnol�gica', array('controller' => 'pages', 'action' => 'el_inet')); ?>
                <ul>
                    <li>Prop�sitos</li>
                    <li>Ideas eje</li>
                    <li>Entidades relacionadas</li>
                </ul>
            </li>
            
            <li><?php echo $html->link('Las pol�ticas para la Educaci�n T�cnico Profesional en Argentina', array('controller' => 'pages', 'action' => 'grafo_ley')); ?>
                <ul>
                    <li>Grafo de la ley</li>
                </ul>
            </li>
            
            <li><?php echo $html->link('La Educaci�n T�cnico Profesional en cifras', array('controller' => 'pages', 'action' => 'mapas_y_graficos')); ?></li>
            
            <li><?php echo $html->link('Buscadores', array('controller' => 'pages', 'action' => 'buscadores')); ?>
                <ul>
                    <li><?php echo $html->link('Gu�a del Estudiante',array('controller'=>'titulos', 'action'=>'guiaDelEstudiante')); ?></li>
                    <li><?php echo $html->link('B�squeda de t�tulos y certificaciones',array('controller'=>'titulos', 'action'=>'search')); ?>
                        <ul>
                            <li><?php echo $html->link('Nivel Secundario T�cnico',array('controller'=>'titulos', 'action'=>'search', SEC_TEC_ID)); ?></li>
                            <li><?php echo $html->link('Nivel Superior T�cnico', array('controller'=>'titulos', 'action'=>'search', SUP_TEC_ID)); ?></li>
                            <li><?php echo $html->link('Formaci�n Profesional', array('controller'=>'titulos', 'action'=>'search', FP_ID)); ?></li>
                        </ul>
                    </li>
                    <li><?php echo $html->link('B�squeda por instituciones',array('controller'=>'instits', 'action'=>'search')); ?></li>
                </ul>
            </li>
            
            <li><?php echo $html->link('Documentaci�n', array('controller' => 'pages', 'action' => 'doc_index')); ?></li>
            <li><?php echo $html->link('Contacto', array('controller' => 'correos', 'action' => 'contacto')); ?></li>
        </ul>
    </div>
</div>